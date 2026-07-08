<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Managed text fields (key => label).
     */
    private const TEXT_FIELDS = [
        'hero_badge' => 'Hero: Badge',
        'hero_title' => 'Hero: Title',
        'hero_subtitle' => 'Hero: Subtitle',
        'hero_cta_primary_label' => 'Hero: Primary Button Label',
        'hero_cta_primary_url' => 'Hero: Primary Button URL',
        'hero_cta_secondary_label' => 'Hero: Secondary Button Label',
        'hero_cta_secondary_url' => 'Hero: Secondary Button URL',
        'cta_title' => 'CTA: Title',
        'cta_subtitle' => 'CTA: Subtitle',
        'cta_button_label' => 'CTA: Button Label',
        'cta_button_url' => 'CTA: Button URL',
    ];

    public function edit(): View
    {
        return view('admin.settings.edit', [
            'fields' => self::TEXT_FIELDS,
            'settings' => Setting::map(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $rules = ['hero_image' => ['nullable', 'image', 'max:4096']];
        foreach (array_keys(self::TEXT_FIELDS) as $key) {
            $rules[$key] = ['nullable', 'string', 'max:1000'];
        }
        $validated = $request->validate($rules);

        foreach (array_keys(self::TEXT_FIELDS) as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $validated[$key] ?? '']);
        }

        if ($request->hasFile('hero_image')) {
            $current = Setting::where('key', 'hero_image')->value('value');
            if ($current && Str::startsWith($current, 'storage/')) {
                Storage::disk('public')->delete(Str::after($current, 'storage/'));
            }
            $path = 'storage/'.$request->file('hero_image')->store('hero', 'public');
            Setting::updateOrCreate(['key' => 'hero_image'], ['value' => $path]);
        }

        return redirect()->route('admin.settings.edit')->with('status', 'Settings saved successfully.');
    }
}
