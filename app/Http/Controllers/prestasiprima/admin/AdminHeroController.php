<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\HeroVideo;
use App\Models\prestasiprima\ActivityLog;

class AdminHeroController extends Controller
{
    /**
     * Display a listing of the hero videos.
     */
    public function index()
    {
        if (HeroVideo::count() === 0) {
            HeroVideo::seedDefault();
        }

        $heroVideos = HeroVideo::orderBy('is_active', 'desc')->latest()->paginate(10);
        $activeHero = HeroVideo::where('is_active', true)->first() ?: HeroVideo::latest()->first();

        return view('prestasiprima.admin.hero.index', compact('heroVideos', 'activeHero'));
    }

    /**
     * Show the form for creating a new hero video preset.
     */
    public function create()
    {
        return view('prestasiprima.admin.hero.create');
    }

    /**
     * Store a newly created hero video in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|string|max:500',
            'tagline' => 'nullable|string|max:255',
            'headline_top' => 'nullable|string|max:100',
            'headline_bottom' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:1000',
            'hud_tag' => 'nullable|string|max:100',
            'hud_status' => 'nullable|string|max:100',
            'hud_mission' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['video_id'] = HeroVideo::parseYoutubeId($validated['video_url']);
        $isActive = $request->boolean('is_active');
        $validated['is_active'] = $isActive;

        // If marked active or first entry, deactivate others
        if ($isActive || HeroVideo::count() === 0) {
            HeroVideo::where('is_active', true)->update(['is_active' => false]);
            $validated['is_active'] = true;
        }

        $hero = HeroVideo::create($validated);

        ActivityLog::log('create', "Menambahkan video hero baru: '{$hero->title}'");

        return redirect()
            ->route('prestasiprima.admin.hero.index')
            ->with('success', 'Video Hero berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified hero video.
     */
    public function edit($id)
    {
        $hero = HeroVideo::findOrFail($id);
        return view('prestasiprima.admin.hero.edit', compact('hero'));
    }

    /**
     * Update the specified hero video in storage.
     */
    public function update(Request $request, $id)
    {
        $hero = HeroVideo::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'video_url' => 'required|string|max:500',
            'tagline' => 'nullable|string|max:255',
            'headline_top' => 'nullable|string|max:100',
            'headline_bottom' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:1000',
            'hud_tag' => 'nullable|string|max:100',
            'hud_status' => 'nullable|string|max:100',
            'hud_mission' => 'nullable|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['video_id'] = HeroVideo::parseYoutubeId($validated['video_url']);
        $isActive = $request->boolean('is_active');
        $validated['is_active'] = $isActive;

        if ($isActive) {
            HeroVideo::where('id', '!=', $hero->id)->update(['is_active' => false]);
        }

        $hero->update($validated);

        ActivityLog::log('update', "Memperbarui video hero: '{$hero->title}'");

        return redirect()
            ->route('prestasiprima.admin.hero.index')
            ->with('success', 'Konfigurasi Video Hero berhasil diperbarui!');
    }

    /**
     * Remove the specified hero video from storage.
     */
    public function destroy($id)
    {
        $hero = HeroVideo::findOrFail($id);
        $wasActive = $hero->is_active;
        $title = $hero->title;

        $hero->delete();

        // If deleted video was active, promote the latest remaining one
        if ($wasActive) {
            $nextActive = HeroVideo::latest()->first();
            if ($nextActive) {
                $nextActive->update(['is_active' => true]);
            }
        }

        ActivityLog::log('delete', "Menghapus video hero: '{$title}'");

        return redirect()
            ->route('prestasiprima.admin.hero.index')
            ->with('success', 'Preset Video Hero berhasil dihapus.');
    }

    /**
     * Set a hero video as the active one.
     */
    public function setActive($id)
    {
        $hero = HeroVideo::findOrFail($id);

        HeroVideo::where('id', '!=', $id)->update(['is_active' => false]);
        $hero->update(['is_active' => true]);

        ActivityLog::log('update', "Mengaktifkan video hero: '{$hero->title}'");

        return redirect()
            ->route('prestasiprima.admin.hero.index')
            ->with('success', "Video '{$hero->title}' kini aktif di beranda website!");
    }
}
