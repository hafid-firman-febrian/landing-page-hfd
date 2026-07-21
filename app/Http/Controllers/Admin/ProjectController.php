<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('admin.projects.index', [
            'projects' => Project::ordered()->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.projects.create', ['project' => new Project()]);
    }

    public function store(Request $request): RedirectResponse
    {
        Project::create($this->validated($request));

        return redirect()->route('admin.projects.index')->with('status', 'Project created successfully.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $project->update($this->validated($request, $project));

        return redirect()->route('admin.projects.index')->with('status', 'Project updated successfully.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->deleteImage($project->thumbnail);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('status', 'Project deleted successfully.');
    }

    private function validated(Request $request, ?Project $project = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['string', 'max:255'],
            'summary' => ['required', 'string'],
            'thumbnail' => ['nullable', 'image', 'max:4096'],
            'is_flagship' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['slug'] = $this->uniqueSlug(($data['slug'] ?? '') ?: $data['title'], $project);
        $data['categories'] = $this->cleanCategories($data['categories'] ?? []);
        $data['is_flagship'] = $request->boolean('is_flagship');
        $data['is_active'] = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        if ($request->hasFile('thumbnail')) {
            $this->deleteImage($project?->thumbnail);
            $data['thumbnail'] = 'storage/'.$request->file('thumbnail')->store('projects', 'public');
        } else {
            unset($data['thumbnail']);
        }

        return $data;
    }

    private function cleanCategories(array $categories): ?array
    {
        $cleaned = collect($categories)
            ->map(fn ($category) => trim($category))
            ->filter()
            ->unique()
            ->values()
            ->all();

        return $cleaned === [] ? null : $cleaned;
    }

    private function uniqueSlug(string $value, ?Project $project): string
    {
        $base = Str::slug($value);
        $slug = $base;
        $i = 2;

        while (Project::where('slug', $slug)->when($project, fn ($q) => $q->whereKeyNot($project->id))->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }

    private function deleteImage(?string $path): void
    {
        if ($path && Str::startsWith($path, 'storage/')) {
            Storage::disk('public')->delete(Str::after($path, 'storage/'));
        }
    }
}
