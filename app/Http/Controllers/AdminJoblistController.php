<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Company;

class AdminJoblistController extends Controller
{
    public function index()
    {
        $jobs = Job::with('company')->latest()->get();
        $companies = Company::all();

        return view('pressmalancer.admin.jobs', compact('jobs', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'location' => 'required|string',
            'salary' => 'nullable|numeric',
            'description' => 'required|string',
        ]);

        Job::create($request->all());

        return redirect()->route('admin.jobs.index')->with('success', 'Pekerjaan berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail($id);
        $job->delete();

        return redirect()->route('admin.jobs.index')->with('success', 'Pekerjaan berhasil dihapus');
    }
}
