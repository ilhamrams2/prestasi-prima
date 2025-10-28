<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\PrestasiprimaGallery;
use Illuminate\Support\Str;

class AdminGalleryController extends Controller
{
    /**
     * Daftar galeri (admin)
     */
    public function index()
    {
        $galleries = PrestasiprimaGallery::latest()->paginate(10);
        return view('prestasiprima.admin.gallery.index', compact('galleries'));
    }

    /**
     * Form tambah galeri
     */
    public function create()
    {
        $categories = $this->getCategories();
        return view('prestasiprima.admin.gallery.create', compact('categories'));
    }

    /**
     * Simpan galeri baru
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);

        // Upload file image jika ada
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $data['thumbnail'] = $request->file('thumbnail')->store('galleries', 'public');
        }

        // Jika tipe video dan tidak ada thumbnail, ambil dari YouTube
        if ($data['type'] === 'video' && !empty($data['video_url'])) {
            $data['thumbnail'] = $data['thumbnail'] ?? $this->getYoutubeThumbnail($data['video_url']);
        }

        PrestasiprimaGallery::create($data);

        return redirect()
            ->route('prestasiprima.admin.gallery.index')
            ->with('success', 'Item galeri berhasil ditambahkan!');
    }

    /**
     * Form edit galeri
     */
    public function edit($id)
    {
        $gallery = PrestasiprimaGallery::findOrFail($id);
        $categories = $this->getCategories();
        return view('prestasiprima.admin.gallery.edit', compact('gallery', 'categories'));
    }

    /**
     * Update galeri
     */
    public function update(Request $request, $id)
    {
        $gallery = PrestasiprimaGallery::findOrFail($id);
        $data = $this->validateData($request);

        // Upload file image jika ada
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $data['thumbnail'] = $request->file('thumbnail')->store('galleries', 'public');
        }

        // Jika tipe video dan tidak ada thumbnail, ambil dari YouTube
        if ($data['type'] === 'video' && !empty($data['video_url'])) {
            $data['thumbnail'] = $data['thumbnail'] ?? $this->getYoutubeThumbnail($data['video_url']);
        }

        $gallery->update($data);

        return redirect()
            ->route('prestasiprima.admin.gallery.index')
            ->with('success', 'Item galeri berhasil diperbarui!');
    }

    /**
     * Hapus galeri
     */
    public function destroy($id)
    {
        $gallery = PrestasiprimaGallery::findOrFail($id);
        $gallery->delete();

        return back()->with('success', 'Item galeri berhasil dihapus!');
    }

    /**
     * Validasi input
     */
    private function validateData(Request $request)
    {
        return $request->validate([
            'title'       => 'required|string|max:255',
            'type'        => 'required|in:image,video',
            'thumbnail'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'video_url'   => 'nullable|string',
            'description' => 'nullable|string',
            'category'    => 'nullable|string',
        ]);
    }

    /**
     * Ambil thumbnail YouTube otomatis
     */
    private function getYoutubeThumbnail(string $url): ?string
    {
        preg_match("/(?:youtu\.be\/|youtube\.com\/(?:watch\?v=|embed\/|live\/))([\w\-]+)/", $url, $matches);
        $videoId = $matches[1] ?? null;

        return $videoId ? "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg" : null;
    }

    /**
     * Daftar kategori default
     */
    private function getCategories(): array
    {
        return [
            'Kegiatan Sekolah',
            'Prestasi',
            'Kunjungan',
            'Lomba',
            'Ekstrakurikuler',
            'Kesehatan',
            'Olahraga',
        ];
    }
}
