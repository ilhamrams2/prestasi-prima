<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display the user's profile.
     */
    public function show()
    {
        $user = Auth::user();
        
        // Get or create profile
        $profile = $user->profile ?? Profile::create([
            'user_id' => $user->id,
            'bio' => '',
            'location' => '',
            'phone' => '',
            'skills' => json_encode([]),
            'avatar' => null,
        ]);

        // Calculate profile completion
        $profileCompletion = $this->calculateProfileCompletion($user, $profile);
    // Get user stats
    // Use the Application model directly instead of an undefined User::applications() relationship
    $applicationsCount = Application::where('user_id', $user->id)->count();
    // 'Tersimpan' replaced with 'Diterima' = accepted applications
    $savedJobsCount = Application::where('user_id', $user->id)->where('status', 'accepted')->count();

        return view('pressmalancer.pages.profile', compact('user', 'profile', 'profileCompletion', 'applicationsCount', 'savedJobsCount'));
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Ensure $user is an instance of the Eloquent User model so ->save() is available
        if (! $user instanceof User) {
            // Try to load the User model by the authenticated id as a fallback
            $user = User::find(Auth::id());
        }

        if (! $user) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }
        
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'skills' => 'nullable|array',
            'skills.*' => 'string|max:50',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Update user info
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();

            // Get or create profile
            $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

            // Handle avatar upload
            if ($request->hasFile('avatar')) {
                // Delete old avatar if exists
                if ($profile->avatar && Storage::disk('public')->exists($profile->avatar)) {
                    Storage::disk('public')->delete($profile->avatar);
                }

                $avatarPath = $request->file('avatar')->store('avatars', 'public');
                $profile->avatar = $avatarPath;
            }

            // Update profile fields
            $profile->phone = $request->phone;
            $profile->location = $request->location;
            $profile->bio = $request->bio;
            $profile->skills = $request->skills ? json_encode($request->skills) : json_encode([]);
            
            $profile->save();

            return response()->json([
                'success' => true,
                'message' => 'Profil berhasil diperbarui!',
                'data' => [
                    'user' => $user,
                    'profile' => $profile
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Upload avatar via AJAX
     */
    public function uploadAvatar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::user();
            $profile = $user->profile ?? new Profile(['user_id' => $user->id]);

            // Delete old avatar
            if ($profile->avatar && Storage::disk('public')->exists($profile->avatar)) {
                Storage::disk('public')->delete($profile->avatar);
            }

            // Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $profile->avatar = $avatarPath;
            $profile->save();

            return response()->json([
                'success' => true,
                'message' => 'Avatar berhasil diupload!',
                'avatar_url' => Storage::url($avatarPath)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Calculate profile completion percentage
     */
    private function calculateProfileCompletion($user, $profile)
    {
        $totalFields = 8;
        $completedFields = 0;

        // Check each field
        if ($user->name) $completedFields++;
        if ($user->email) $completedFields++;
        if ($profile->phone) $completedFields++;
        if ($profile->location) $completedFields++;
        if ($profile->bio) $completedFields++;
        if ($profile->avatar) $completedFields++;
        
        $skills = json_decode($profile->skills ?? '[]', true);
        if (is_array($skills) && count($skills) > 0) $completedFields++;
        if (is_array($skills) && count($skills) >= 3) $completedFields++;

        return round(($completedFields / $totalFields) * 100);
    }
}
