<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function form()
    {
        $profile = Profile::first(); // hanya satu record
        return view('admin.profile.index', compact('profile'));
    }
    
    public function show()
    {
        $profile = Profile::first(); // ambil 1 record
        return view('profile', compact('profile'));
    }

    public function storeOrUpdate(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'logo' => 'nullable|image|mimes:png,jpg,jpeg,ico|max:2048'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
        ];

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logo', 'public');
            $data['logo'] = $logoPath;
        }

        Profile::updateOrCreate(['id' => 1], $data);

        return redirect()->route('admin.profile.index')->with('success', 'Profil berhasil diperbarui!');
    }
}
