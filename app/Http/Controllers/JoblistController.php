<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class JoblistController extends Controller
{
    public function index()
    {
        // ambil job yang belum diambil
        $jobs = Job::with('company')->where('is_taken', false)->latest()->get();
        return view('pressmalancer.pages.joblist', compact('jobs'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('pressmalancer.pages.create-job', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'nullable|numeric'
        ]);

        Job::create($request->all());
        return redirect()->route('joblist.index')->with('success', 'Job berhasil ditambahkan!');
    }

    public function take($id)
    {
        $job = Job::findOrFail($id);
        $job->update(['is_taken' => true]);
        return redirect()->route('joblist.index')->with('success', 'Job berhasil diambil!');
    }

    public function destroy($id)
    {
        Job::findOrFail($id)->delete();
        return redirect()->route('joblist.index')->with('success', 'Job berhasil dihapus!');
    }
}
