<?php

namespace App\Http\Controllers\Presmaboard;

use App\Http\Controllers\Controller;
use App\Models\presmaboard\PresmaboardProject;
use App\Models\presmaboard\PresmaboardProjectCategory;
use App\Models\presmaboard\PresmaboardStudent;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    function index(Request $request)
    {
        $categories = PresmaboardProjectCategory::all();
        $students = PresmaboardStudent::select('id', 'nama')
            ->withCount('projects')
            ->orderBy('nama')
            ->get();

        $projects = PresmaboardProject::with(['student', 'category'])
            ->withCount('category')
            ->when($request->category, function ($query) use ($request) {
                $query->where('category_id', $request->category);
            })
            ->when($request->search, function ($query) use ($request) {
                $query->whereRelation('student', 'nama', 'like', "%$request->search%")
                    ->orWhere('judul', $request->search);
            })
            ->latest()
            ->get();

        return view('presmaboard.project', [
            'categories' => $categories,
            'students' => $students,
            'projects' => $projects,
            'statistics' => [
                'project_count' => $projects->count(),
                'most_project_student' => $students->sortByDesc('projects_count')->first()?->nama,
                'most_category_project' => $categories->sortByDesc('category_count')->first()?->jurusan
            ]
        ]);
    }

    function store(Request $request)
    {
        try {
            if ($file = $request->file('foto')) {
                $filename = 'project-' . time() . '.' . $file->getClientOriginalExtension();
                $request->file('foto')->storePubliclyAs('presmaboard/projects', $filename, 'public');
            }

            PresmaboardProject::create([
                'student_id' => $request->student_id,
                'category_id' => $request->category_id,
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'gambar' => $$filename ?? null
            ]);
            return redirect()->back()->with('success', 'Project berhasil ditambahkan');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    function update(PresmaboardProject $project, Request $request)
    {
        try {
            if ($file = $request->file('foto')) {
                $filename = 'project-' . time() . '.' . $file->getClientOriginalExtension();
                $request->file('foto')->storePubliclyAs('presmaboard/projects', $filename, 'public');
            }

            $project->update([
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'deskripsi' => $request->deskripsi,
                'gambar' => $filename ?? null
            ]);
            return redirect()->back()->with('success', 'Project berhasil diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    function destroy(PresmaboardProject $project)
    {
        try {
            $project->delete();
            return redirect()->back()->with('success', 'Project berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', $th->getMessage());
        }
    }
}
