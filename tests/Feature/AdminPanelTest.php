<?php

namespace Tests\Feature;

use App\Models\Service;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create();
    }

    public function test_login_page_renders_for_guests(): void
    {
        $this->get('/login')
            ->assertStatus(200)
            ->assertSee('Log in');
    }

    public function test_admin_dashboard_requires_authentication(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_admin_can_authenticate_and_view_dashboard(): void
    {
        $user = $this->admin();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ])->assertRedirect('/admin');

        $this->assertAuthenticatedAs($user);

        $this->get('/admin')->assertStatus(200)->assertSee('Dashboard');
    }

    public function test_admin_index_pages_render(): void
    {
        $this->actingAs($this->admin());

        $this->get('/admin/services')->assertStatus(200);
        $this->get('/admin/projects')->assertStatus(200);
        $this->get('/admin/testimonials')->assertStatus(200);
        $this->get('/admin/settings')->assertStatus(200);
    }

    public function test_admin_can_create_a_service_and_it_shows_on_landing(): void
    {
        $this->actingAs($this->admin());

        $this->post('/admin/services', [
            'title' => 'Product Consultation',
            'description' => 'A product strategy consultation session.',
            'icon' => '💡',
            'is_active' => '1',
        ])->assertRedirect('/admin/services');

        $this->assertDatabaseHas('services', [
            'title' => 'Product Consultation',
            'slug' => 'product-consultation',
        ]);

        $this->get('/')->assertStatus(200)->assertSee('Product Consultation');
    }

    public function test_admin_can_upload_a_project_thumbnail(): void
    {
        Storage::fake('public');
        $this->actingAs($this->admin());

        $this->post('/admin/projects', [
            'title' => 'Test Project',
            'summary' => 'Test project summary.',
            'thumbnail' => UploadedFile::fake()->image('thumb.jpg'),
            'is_active' => '1',
        ])->assertRedirect('/admin/projects');

        $project = \App\Models\Project::firstWhere('title', 'Test Project');
        $this->assertNotNull($project->thumbnail);
        Storage::disk('public')->assertExists(str_replace('storage/', '', $project->thumbnail));
    }

    public function test_admin_can_update_hero_settings(): void
    {
        $this->actingAs($this->admin());

        $this->put('/admin/settings', [
            'hero_title' => 'New Hero Title',
            'cta_title' => 'New Call to Action',
        ])->assertRedirect('/admin/settings');

        $this->assertSame('New Hero Title', Setting::where('key', 'hero_title')->value('value'));
        $this->get('/')->assertSee('New Hero Title');
    }
}
