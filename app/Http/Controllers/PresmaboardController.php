<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    presmaboard_students,
    presmaboard_scores,
    presmaboard_projects,
    presmaboard_achievements,
    presmaboard_leaderboards
};
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class PresmaboardController extends Controller
{
    public function Eligible_profile($id)
    {
        $student = presmaboard_students::with(['projects', 'achievements', 'scores'])->findOrFail($id);
        return view('presmaboard.eligible', compact('student'));
    }

    public function leaderboard()
    {
        $top3 = presmaboard_leaderboards::with('student')->orderBy('rank', 'asc')->take(3)->get();
        $others = presmaboard_leaderboards::with('student')->orderBy('rank', 'asc')->skip(3)->take(12)->get();
        return view('presmaboard.leaderboard', compact('top3', 'others'));
    }


    public function dashboard()
    {

        return view('presmaboard.dasboard',);
    }

    public function siswa()
    {

        return view('presmaboard.siswa',);
    }

        public function nilai_pkp()
    {

        return view('presmaboard.nilai_pkp',);
    }
        public function prestasi()
    {

        return view('presmaboard.prestasi',);
    }

          public function project()
    {

        return view('presmaboard.project',);
    }



    public function store(Request $request)
    {
        $type = $request->type;

        switch ($type) {
            case 'student':
                $data = $request->validate([
                    'nama' => 'required',
                    'email' => 'required|email',
                    'kelas' => 'required',
                    'jurusan' => 'required',
                    'angkatan' => 'required',
                    'foto' => 'nullable|image|max:2048',
                ]);

                if ($request->hasFile('foto')) {
                    $data['foto'] = $request->file('foto')->store('students', 'public');
                }

                presmaboard_students::create($data);
                break;

            case 'project':
                $data = $request->validate([
                    'student_id' => 'required',
                    'judul_project' => 'required',
                    'deskripsi' => 'required',
                    'kategori' => 'required',
                    'gambar' => 'nullable|image|max:2048',
                ]);

                if ($request->hasFile('gambar')) {
                    $data['gambar'] = $request->file('gambar')->store('projects', 'public');
                }

                presmaboard_projects::create($data);
                break;

            case 'achievement':
                $data = $request->validate([
                    'student_id' => 'required',
                    'judul_prestasi' => 'required',
                    'deskripsi' => 'required',
                    'tanggal' => 'required|date',
                ]);

                presmaboard_achievements::create($data);
                break;

            case 'score':
                $data = $request->validate([
                    'student_id' => 'required',
                    'nilai_pkp' => 'required|numeric',
                    'semester' => 'required',
                    'tahun_ajaran' => 'required',
                    'tipe_ujian' => 'required',
                ]);
                presmaboard_scores::create($data);
                break;

            case 'leaderboard':
                $data = $request->validate([
                    'student_id' => 'required',
                    'periode' => 'required',
                    'rank' => 'required|integer|min:1',
                    'nilai_pkp' => 'required|numeric',
                ]);
                $data['published_at'] = Carbon::now();
                presmaboard_leaderboards::create($data);
                break;
        }

        return back()->with('success', ucfirst($type) . ' berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $type = $request->type;

        switch ($type) {
            case 'student':
                $student = presmaboard_students::findOrFail($id);
                $data = $request->all();
                if ($request->hasFile('foto')) {
                    if ($student->foto) Storage::disk('public')->delete($student->foto);
                    $data['foto'] = $request->file('foto')->store('students', 'public');
                }
                $student->update($data);
                break;

            case 'project':
                presmaboard_projects::findOrFail($id)->update($request->all());
                break;

            case 'achievement':
                presmaboard_achievements::findOrFail($id)->update($request->all());
                break;

            case 'score':
                presmaboard_scores::findOrFail($id)->update($request->all());
                break;

            case 'leaderboard':
                presmaboard_leaderboards::findOrFail($id)->update($request->all());
                break;
        }

        return back()->with('success', ucfirst($type) . ' berhasil diperbarui.');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = \App\Models\presmaboard_users::where('email', $request->email)->first();

        if (!$user || !\Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah!']);
        }

        session(['presmaboard_user' => $user]);

        return redirect()->route('presmaboard.dashboard')
            ->with('success', 'Berhasil login sebagai ' . $user->name);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('presmaboard_user');
        return redirect()->route('presmaboard.login')->with('success', 'Berhasil logout.');
    }





    public function destroy($id, Request $request)
    {
        $type = $request->type;

        $model = match ($type) {
            'student' => presmaboard_students::class,
            'project' => presmaboard_projects::class,
            'achievement' => presmaboard_achievements::class,
            'score' => presmaboard_scores::class,
            'leaderboard' => presmaboard_leaderboards::class,
        };

        $model::findOrFail($id)->delete();

        return back()->with('success', ucfirst($type) . ' berhasil dihapus.');
    }
}
