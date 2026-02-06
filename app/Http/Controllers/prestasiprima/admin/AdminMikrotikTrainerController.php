<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\MikrotikTrainer;
use App\Models\prestasiprima\MikrotikCertificate;
use Illuminate\Http\Request;
use App\Services\prestasiprima\MediaService;
use Illuminate\Support\Facades\DB;

class AdminMikrotikTrainerController extends Controller
{
    public function index()
    {
        $trainers = MikrotikTrainer::with('certificates')->latest()->paginate(10);
        return view('prestasiprima.admin.mikrotik.index', compact('trainers'));
    }

    public function create()
    {
        return view('prestasiprima.admin.mikrotik.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'certificates' => 'nullable|array',
            'certificates.*.title' => 'required|string|max:255',
            'certificates.*.verify_id' => 'nullable|string|max:255',
            'certificates.*.image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $photoPath = MediaService::upload($request->file('photo'), 'mikrotik/trainers', 600);

            $trainer = MikrotikTrainer::create([
                'name' => $request->name,
                'title' => $request->title,
                'role' => $request->role,
                'description' => $request->description,
                'photo' => basename($photoPath),
                'is_active' => true,
            ]);

            if ($request->has('certificates')) {
                foreach ($request->file('certificates') as $index => $certFile) {
                    $certImagePath = MediaService::upload($certFile['image'], 'mikrotik/certificates', 1200);
                    $trainer->certificates()->create([
                        'title' => $request->certificates[$index]['title'],
                        'verify_id' => $request->certificates[$index]['verify_id'],
                        'image' => basename($certImagePath),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('prestasiprima.admin.mikrotik.index')->with('success', 'Trainer berhasil ditambahkan.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menambahkan trainer: ' . $e->getMessage());
        }
    }

    public function edit(MikrotikTrainer $trainer)
    {
        $trainer->load('certificates');
        return view('prestasiprima.admin.mikrotik.edit', compact('trainer'));
    }

    public function update(Request $request, MikrotikTrainer $trainer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'new_certificates' => 'nullable|array',
            'new_certificates.*.title' => 'required|string|max:255',
            'new_certificates.*.verify_id' => 'nullable|string|max:255',
            'new_certificates.*.image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'existing_certificates' => 'nullable|array',
            'existing_certificates.*.id' => 'required|exists:mikrotik_certificates,id',
            'existing_certificates.*.title' => 'required|string|max:255',
            'existing_certificates.*.verify_id' => 'nullable|string|max:255',
            'existing_certificates.*.image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'deleted_certificates' => 'nullable|string', // Comma separated IDs
        ]);

        DB::beginTransaction();
        try {
            if ($request->hasFile('photo')) {
                MediaService::delete('mikrotik/trainers/' . $trainer->photo);
                $photoPath = MediaService::upload($request->file('photo'), 'mikrotik/trainers', 600);
                $trainer->photo = basename($photoPath);
            }

            $trainer->update([
                'name' => $request->name,
                'title' => $request->title,
                'role' => $request->role,
                'description' => $request->description,
            ]);

            // Handle Deleted Certificates
            if ($request->deleted_certificates) {
                $ids = explode(',', $request->deleted_certificates);
                $certsToDelete = MikrotikCertificate::whereIn('id', $ids)->get();
                foreach ($certsToDelete as $cert) {
                    MediaService::delete('mikrotik/certificates/' . $cert->image);
                    $cert->delete();
                }
            }

            // Handle Existing Certificates Update
            if ($request->has('existing_certificates')) {
                foreach ($request->existing_certificates as $id => $data) {
                    $cert = MikrotikCertificate::find($data['id']);
                    if ($cert) {
                        $updateData = [
                            'title' => $data['title'],
                            'verify_id' => $data['verify_id'],
                        ];

                        if (isset($request->file('existing_certificates')[$id]['image'])) {
                            MediaService::delete('mikrotik/certificates/' . $cert->image);
                            $path = MediaService::upload($request->file('existing_certificates')[$id]['image'], 'mikrotik/certificates', 1200);
                            $updateData['image'] = basename($path);
                        }

                        $cert->update($updateData);
                    }
                }
            }

            // Handle New Certificates
            if ($request->has('new_certificates')) {
                foreach ($request->file('new_certificates') as $index => $certFile) {
                    $certImagePath = MediaService::upload($certFile['image'], 'mikrotik/certificates', 1200);
                    $trainer->certificates()->create([
                        'title' => $request->new_certificates[$index]['title'],
                        'verify_id' => $request->new_certificates[$index]['verify_id'],
                        'image' => basename($certImagePath),
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('prestasiprima.admin.mikrotik.index')->with('success', 'Trainer berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui trainer: ' . $e->getMessage());
        }
    }

    public function destroy(MikrotikTrainer $trainer)
    {
        DB::beginTransaction();
        try {
            MediaService::delete('mikrotik/trainers/' . $trainer->photo);
            foreach ($trainer->certificates as $cert) {
                MediaService::delete('mikrotik/certificates/' . $cert->image);
            }
            $trainer->delete();
            DB::commit();
            return redirect()->route('prestasiprima.admin.mikrotik.index')->with('success', 'Trainer berhasil dihapus.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal menghapus trainer: ' . $e->getMessage());
        }
    }
}
