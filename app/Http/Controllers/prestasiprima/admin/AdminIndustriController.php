<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prestasiprima\Industri;

class AdminIndustriController extends Controller
{
    public function index()
    {
        $industris = Industri::all();
        return view('prestasiprima.admin.industri.index', compact('industris'));
    }

    public function create()
    {
        return view('prestasiprima.admin.industri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:prestasiprima_industris,slug',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $logoPath = $request->hasFile('logo') ? $request->file('logo')->store('industri', 'public') : null;

        Industri::create([
            'nama' => $request->nama,
            'slug' => $request->slug,
            'logo' => $logoPath,
        ]);

        return redirect()->route('prestasiprima.admin.industri.index')->with('success', 'Industri berhasil ditambahkan!');
    }

    public function edit(Industri $industri)
    {
        return view('prestasiprima.admin.industri.edit', compact('industri'));
    }

    public function update(Request $request, Industri $industri)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:prestasiprima_industris,slug,' . $industri->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        if ($request->hasFile('logo')) {
            if ($industri->logo && \Storage::disk('public')->exists($industri->logo)) {
                \Storage::disk('public')->delete($industri->logo);
            }
            $industri->logo = $request->file('logo')->store('industri', 'public');
        }

        $industri->nama = $request->nama;
        $industri->slug = $request->slug;
        $industri->save();

        return redirect()->route('prestasiprima.admin.industri.index')->with('success', 'Industri berhasil diperbarui!');
    }

    public function destroy(Industri $industri)
    {
        if ($industri->logo && \Storage::disk('public')->exists($industri->logo)) {
            \Storage::disk('public')->delete($industri->logo);
        }

        $industri->delete();

        return redirect()->route('prestasiprima.admin.industri.index')->with('success', 'Industri berhasil dihapus!');
    }
}
