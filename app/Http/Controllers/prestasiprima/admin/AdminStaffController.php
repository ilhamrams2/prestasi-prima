<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Services\prestasiprima\MediaService;

class AdminStaffController extends Controller
{
    // Menampilkan daftar staff di admin
    public function index()
    {
        $staffs = Staff::orderBy('kategori')
                    ->orderBy('nama')
                    ->paginate(10); // maksimal 10 staff per halaman
        return view('prestasiprima.admin.staff.index', compact('staffs'));
    }

    // Form tambah staff
    public function create()
    {
        return view('prestasiprima.admin.staff.create');
    }

    // Simpan staff baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|string|in:kepala,kaprog,kesiswaan,guru_mapel',
            'foto' => 'required|image|mimes:jpg,jpeg,png,webp|max:15360',
            'kutipan' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('foto')) {
            $path = MediaService::upload($request->file('foto'), 'staff', 600);
            $foto = basename($path);
        }

        Staff::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'foto' => $foto,
            'kutipan' => $request->kutipan,
        ]);

        return redirect()->route('prestasiprima.admin.staff.index')->with('success', 'Staff berhasil ditambahkan.');
    }

    // Detail staff
    public function show(Staff $staff)
    {
        return view('prestasiprima.admin.staff.show', compact('staff'));
    }

    // Form edit staff
    public function edit(Staff $staff)
    {
        return view('prestasiprima.admin.staff.edit', compact('staff'));
    }

    // Update staff
    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'kategori' => 'required|string|in:kepala,kaprog,kesiswaan,guru_mapel',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:15360',
            'kutipan' => 'nullable|string|max:1000',
        ]);

        if ($request->hasFile('foto')) {
            if ($staff->foto) {
                MediaService::delete('staff/' . $staff->foto);
            }
            $path = MediaService::upload($request->file('foto'), 'staff', 600);
            $staff->foto = basename($path);
        }

        $staff->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'kategori' => $request->kategori,
            'kutipan' => $request->kutipan,
        ]);

        return redirect()->route('prestasiprima.admin.staff.index')->with('success', 'Staff berhasil diperbarui.');
    }

    // Hapus staff
    public function destroy(Staff $staff)
    {
        if ($staff->foto && Storage::disk('public')->exists('staff/'.$staff->foto)) {
            Storage::disk('public')->delete('staff/'.$staff->foto);
        }

        $staff->delete();

        return redirect()->route('prestasiprima.admin.staff.index')->with('success', 'Staff berhasil dihapus.');
    }
}
