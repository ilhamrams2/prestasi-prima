<?php

namespace App\Http\Controllers\Siakad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\siakad\SiakadAnnouncement;

class AnnouncementController extends Controller
{
    /**
     * Tampilkan daftar semua pengumuman.
     */
    public function index()
    {
        $announcements = SiakadAnnouncement::latest()->get();
        return view('siakad.pages.announcements.index', compact('announcements'));
    }

    /**
     * Tampilkan form untuk membuat pengumuman baru.
     */
    public function create()
    {
        return view('siakad.pages.announcements.create');
    }

    /**
     * Simpan pengumuman baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        SiakadAnnouncement::create($request->only(['title', 'content', 'priority', 'category']));

        return redirect()->route('announcements.index')
                         ->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    /**
     * Tampilkan detail pengumuman tertentu.
     */
    public function show($id)
    {
        $announcement = SiakadAnnouncement::findOrFail($id);
        return view('siakad.pages.announcements.show', compact('announcement'));
    }

    /**
     * Tampilkan form edit pengumuman.
     */
    public function edit($id)
    {
        $announcement = SiakadAnnouncement::findOrFail($id);
        return view('siakad.pages.announcements.edit', compact('announcement'));
    }

    /**
     * Update pengumuman tertentu.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'priority' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $announcement = SiakadAnnouncement::findOrFail($id);
        $announcement->update($request->only(['title', 'content', 'priority', 'category']));

        return redirect()->route('announcements.index')
                         ->with('success', 'Pengumuman berhasil diperbarui.');
    }

    /**
     * Hapus pengumuman.
     */
    public function destroy($id)
    {
        $announcement = SiakadAnnouncement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('announcements.index')
                         ->with('success', 'Pengumuman berhasil dihapus.');
    }
}
