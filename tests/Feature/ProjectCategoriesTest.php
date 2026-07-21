<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectCategoriesTest extends TestCase
{
    use RefreshDatabase;

    public function test_categories_are_cast_to_an_array(): void
    {
        $project = Project::create([
            'title' => 'Cast Check',
            'slug' => 'cast-check',
            'categories' => ['AI Product', 'SaaS Platform'],
            'summary' => 'Checking the categories cast.',
        ]);

        $project->refresh();

        $this->assertSame(['AI Product', 'SaaS Platform'], $project->categories);
    }

    public function test_admin_can_create_a_project_with_multiple_categories(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post('/admin/projects', [
            'title' => 'Multi Category Project',
            'summary' => 'A project with more than one category.',
            'categories' => ['AI Product', '', ' SaaS Platform ', 'AI Product'],
            'is_active' => '1',
        ])->assertRedirect('/admin/projects');

        $project = Project::firstWhere('title', 'Multi Category Project');

        $this->assertSame(['AI Product', 'SaaS Platform'], $project->categories);
    }

    public function test_project_categories_are_null_when_none_provided(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post('/admin/projects', [
            'title' => 'No Category Project',
            'summary' => 'A project without categories.',
            'is_active' => '1',
        ])->assertRedirect('/admin/projects');

        $project = Project::firstWhere('title', 'No Category Project');

        $this->assertNull($project->categories);
    }

    public function test_edit_form_prefills_existing_categories(): void
    {
        $this->actingAs(User::factory()->create());

        $project = Project::create([
            'title' => 'Prefill Check',
            'slug' => 'prefill-check',
            'categories' => ['Fintech', 'Mobile App'],
            'summary' => 'Checking prefill.',
        ]);

        $this->get("/admin/projects/{$project->id}/edit")
            ->assertStatus(200)
            ->assertSee('Fintech')
            ->assertSee('Mobile App');
    }

    public function test_admin_index_lists_categories_joined_with_commas(): void
    {
        $this->actingAs(User::factory()->create());

        Project::create([
            'title' => 'List Check',
            'slug' => 'list-check',
            'categories' => ['Fintech', 'Mobile App'],
            'summary' => 'Checking list display.',
        ]);

        $this->get('/admin/projects')
            ->assertStatus(200)
            ->assertSee('Fintech, Mobile App');
    }

    public function test_landing_page_renders_chips_for_the_flagship_project(): void
    {
        Project::create([
            'title' => 'Flagship Project',
            'slug' => 'flagship-project',
            'categories' => ['Fintech', 'Mobile App'],
            'summary' => 'Shown as the flagship.',
            'is_flagship' => true,
            'is_active' => true,
        ]);

        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Fintech')
            ->assertSee('Mobile App');
    }

    public function test_landing_page_renders_chips_for_a_grid_card_project(): void
    {
        Project::create([
            'title' => 'Grid Card Project',
            'slug' => 'grid-card-project',
            'categories' => ['AI Product', 'SaaS Platform'],
            'summary' => 'Shown as a grid card.',
            'is_flagship' => false,
            'is_active' => true,
        ]);

        $this->get('/')
            ->assertStatus(200)
            ->assertSee('AI Product')
            ->assertSee('SaaS Platform');
    }
}
