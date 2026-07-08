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
     * Field teks yang dikelola (key => label).
     */
    private const TEXT_FIELDS = [
        'hero_badge' => 'Hero: Badge',
        'hero_title' => 'Hero: Judul',
        'hero_subtitle' => 'Hero: Subjudul',
        'hero_cta_primary_label' => 'Hero: Label Tombol Utama',
        'hero_cta_primary_url' => 'Hero: URL Tombol Utama',
        'hero_cta_secondary_label' => 'Hero: Label Tombol Kedua',
        'hero_cta_secondary_url' => 'Hero: URL Tombol Kedua',
        'cta_title' => 'CTA: Judul',
        'cta_subtitle' => 'CTA: Subjudul',
        'cta_button_label' => 'CTA: Label Tombol',
        'cta_button_url' => 'CTA: URL Tombol',
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

        return redirect()->route('admin.settings.edit')->with('status', 'Pengaturan berhasil disimpan.');
    }
}
