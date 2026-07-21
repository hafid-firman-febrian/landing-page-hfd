<?php

namespace Tests\Feature;

use App\Models\Project;
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
}
