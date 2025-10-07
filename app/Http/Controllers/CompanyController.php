<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    /**
     * Display a listing of companies.
     */
    public function index(Request $request)
    {
        $query = Company::with('user')->latest();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('company_name', 'like', "%{$search}%")
                  ->orWhere('industry', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $companies = $query->paginate(15);

        return view('pressmalancer.admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        // Get users who don't have a company yet (role = company but no company record)
        $users = User::where('role', 'company')
                     ->whereDoesntHave('company')
                     ->orderBy('name')
                     ->get();
        
        return view('pressmalancer.admin.companies.create', compact('users'));
    }

    /**
     * Store a newly created company in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:presmalancer_users,id|unique:presmalancer_companies,user_id',
            'company_name' => 'required|string|max:150',
            'industry' => 'nullable|string|max:100',
            'website' => [
                'nullable',
                'max:255',
                'regex:/^(https?:\/\/)?([\w\-]+\.)+[\w\-]{2,}(\/.*)?$/i'
            ],
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'logo' => 'nullable|url|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'size' => 'nullable|string|max:50',
            'founded' => 'nullable|digits:4|integer|min:1800|max:' . date('Y'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company = Company::create($request->all());

        return redirect()->route('admin.companies.index')
            ->with('success', 'Perusahaan berhasil ditambahkan!');
    }

    /**
     * Display the specified company.
     */
    public function show(Company $company)
    {
        $company->load('user', 'jobs');
        return view('admin.companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(Company $company)
    {
        $company->load('user');
        return view('pressmalancer.admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified company in storage.
     */
    public function update(Request $request, Company $company)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:150',
            'industry' => 'nullable|string|max:100',
            'website' => [
                'nullable',
                'max:255',
                'regex:/^(https?:\/\/)?([\w\-]+\.)+[\w\-]{2,}(\/.*)?$/i'
            ],
            'description' => 'nullable|string',
            'address' => 'nullable|string',
            'logo' => 'nullable|url|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:100',
            'size' => 'nullable|string|max:50',
            'founded' => 'nullable|digits:4|integer|min:1800|max:' . date('Y'),
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $company->update($request->except('user_id'));

        return redirect()->route('admin.companies.index')
            ->with('success', 'Perusahaan berhasil diperbarui!');
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('admin.companies.index')
            ->with('success', 'Perusahaan berhasil dihapus!');
    }
}
