<?php

namespace App\Http\Controllers\prestasiprima\admin;

use App\Http\Controllers\Controller;
use App\Models\prestasiprima\PPuser;
use App\Models\prestasiprima\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the users.
     */
    public function index()
    {
        $users = PPuser::latest()->paginate(10);
        return view('prestasiprima.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $roles = [
            PPuser::ROLE_SUPER_ADMIN => 'Super Admin',
            PPuser::ROLE_EDITOR => 'Editor',
            PPuser::ROLE_MODERATOR => 'Moderator',
            PPuser::ROLE_VIEWER => 'Viewer',
        ];
        return view('prestasiprima.admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created user in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|confirmed|min:8',
                'role' => 'required|string|in:super_admin,editor,moderator,viewer',
                'status' => 'required|string|in:active,inactive',
            ]);

            $user = PPuser::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'status' => $request->status,
            ]);

            ActivityLog::log('create', "Menambahkan pengguna baru: {$user->email} as {$user->role}", $user);

            return redirect()->route('prestasiprima.admin.users.index')
                ->with('success', 'Pengguna berhasil ditambahkan!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified user.
     */
    public function edit($id)
    {
        $user = PPuser::findOrFail($id);
        
        $roles = [
            PPuser::ROLE_SUPER_ADMIN => 'Super Admin',
            PPuser::ROLE_EDITOR => 'Editor',
            PPuser::ROLE_MODERATOR => 'Moderator',
            PPuser::ROLE_VIEWER => 'Viewer',
        ];

        return view('prestasiprima.admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified user in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $user = PPuser::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|confirmed|min:8',
                'role' => 'required|string|in:super_admin,editor,moderator,viewer',
                'status' => 'required|string|in:active,inactive',
            ]);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'status' => $request->status,
            ];

            if ($request->filled('password')) {
                $data['password'] = Hash::make($request->password);
            }

            $user->update($data);

            ActivityLog::log('update', "Memperbarui pengguna: {$user->email}", $user);

            return redirect()->route('prestasiprima.admin.users.index')
                ->with('success', 'Pengguna berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified user from storage.
     */
    public function destroy($id)
    {
        $user = PPuser::findOrFail($id);

        // Prevent self deletion
        if ($user->id === auth('authPP')->id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri!');
        }

        // Prevent deleting the last super admin
        if ($user->role === PPuser::ROLE_SUPER_ADMIN && PPuser::where('role', PPuser::ROLE_SUPER_ADMIN)->count() <= 1) {
            return back()->with('error', 'Setidaknya harus ada satu Super Admin di sistem!');
        }

        $email = $user->email;
        $user->delete();

        ActivityLog::log('delete', "Menghapus pengguna: {$email}");

        return back()->with('success', 'Pengguna berhasil dihapus!');
    }
}
