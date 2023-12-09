<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Guru;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit',)
            ->with([
                'title' => 'Profile',
                'active' => 'Profile',
                'subActive' => null,
                'triActive' => null,
                'user' => $request->user(),
           ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update_account(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        toast('Informasi Akun berhasil diperbarui', 'success');

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function update_profile(Request $request, $id)
    {
        $request->validate([
            'nama'    => 'required',
            'nip'     => 'required',
            'sebagai' => 'required',
            'telepon' => 'required',
        ]);

        $nama = preg_replace('/[^a-z0-9]+/i', ' ', $request->input('nama'));
        $slug = rtrim(strtolower(str_replace(' ', '-', $nama)), '-');

        $profile = [
            'slug'    => $slug,
            'nama'    => $request->input('nama'),
            'nip'     => $request->input('nip'),
            'sebagai' => $request->input('sebagai'),
            'telepon' => $request->input('telepon'),
        ];

        try {
            Guru::where('id', $id)->update($profile);

            toast('Informasi Profil berhasil diedit!', 'success');
        } catch (\Exception $e) {
            toast('Informasi Profil gagal diedit.', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
