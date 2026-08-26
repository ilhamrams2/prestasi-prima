<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\LulusanPtn;
use App\Models\prestasiprima\ActivityLog;
use App\Services\prestasiprima\MediaService;

class AdminLulusanPtnController extends Controller
{
    /**
     * Display a listing of PTN partners.
     */
    public function index()
    {
        if (LulusanPtn::count() === 0) {
            LulusanPtn::seedDefaults();
        }

        $ptns = LulusanPtn::orderBy('urutan', 'asc')->orderBy('id', 'asc')->paginate(12);
        return view('prestasiprima.admin.lulusan-ptn.index', compact('ptns'));
    }

    /**
     * Show the form for creating a new PTN partner.
     */
    public function create()
    {
        $nextOrder = (LulusanPtn::max('urutan') ?? 0) + 1;
        return view('prestasiprima.admin.lulusan-ptn.create', compact('nextOrder'));
    }

    /**
     * Store a newly created PTN partner.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kampus' => 'required|string|max:255',
            'singkatan' => 'nullable|string|max:50',
            'link_website' => 'nullable|url|max:255',
            'urutan' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'deskripsi' => 'nullable|string',
            'logo' => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:10240',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['urutan'] = $validated['urutan'] ?? ((LulusanPtn::max('urutan') ?? 0) + 1);

        if ($request->hasFile('logo')) {
            $path = MediaService::upload($request->file('logo'), 'ptn', 600);
            $validated['logo'] = $path;
        }

        $ptn = LulusanPtn::create($validated);

        ActivityLog::log('create', "Menambahkan mitra PTN baru: '{$ptn->nama_kampus}'");

        return redirect()
            ->route('prestasiprima.admin.lulusan-ptn.index')
            ->with('success', "Kampus '{$ptn->nama_kampus}' berhasil ditambahkan ke daftar Lulusan PTN!");
    }

    /**
     * Show the form for editing the specified PTN partner.
     */
    public function edit($id)
    {
        $ptn = LulusanPtn::findOrFail($id);
        return view('prestasiprima.admin.lulusan-ptn.edit', compact('ptn'));
    }

    /**
     * Update the specified PTN partner in storage.
     */
    public function update(Request $request, $id)
    {
        $ptn = LulusanPtn::findOrFail($id);

        $validated = $request->validate([
            'nama_kampus' => 'required|string|max:255',
            'singkatan' => 'nullable|string|max:50',
            'link_website' => 'nullable|url|max:255',
            'urutan' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:10240',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('logo')) {
            if ($ptn->logo && !str_starts_with($ptn->logo, 'assets/')) {
                MediaService::delete($ptn->logo);
            }

            $path = MediaService::upload($request->file('logo'), 'ptn', 600);
            $validated['logo'] = $path;
        }

        $ptn->update($validated);

        ActivityLog::log('update', "Memperbarui data mitra PTN: '{$ptn->nama_kampus}'");

        return redirect()
            ->route('prestasiprima.admin.lulusan-ptn.index')
            ->with('success', "Data kampus '{$ptn->nama_kampus}' berhasil diperbarui!");
    }

    /**
     * Remove the specified PTN partner from storage.
     */
    public function destroy($id)
    {
        $ptn = LulusanPtn::findOrFail($id);
        $nama = $ptn->nama_kampus;

        if ($ptn->logo && !str_starts_with($ptn->logo, 'assets/')) {
            MediaService::delete($ptn->logo);
        }

        $ptn->delete();

        ActivityLog::log('delete', "Menghapus kampus mitra PTN: '{$nama}'");

        return redirect()
            ->route('prestasiprima.admin.lulusan-ptn.index')
            ->with('success', "Kampus '{$nama}' berhasil dihapus!");
    }

    /**
     * Toggle active status.
     */
    public function toggleStatus($id)
    {
        $ptn = LulusanPtn::findOrFail($id);
        $ptn->is_active = !$ptn->is_active;
        $ptn->save();

        $status = $ptn->is_active ? 'diaktifkan' : 'dinonaktifkan';
        ActivityLog::log('update', "Mengubah status kampus '{$ptn->nama_kampus}' menjadi {$status}");

        return redirect()
            ->route('prestasiprima.admin.lulusan-ptn.index')
            ->with('success', "Status kampus '{$ptn->nama_kampus}' berhasil {$status}!");
    }
}
