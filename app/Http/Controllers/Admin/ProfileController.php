<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        return view('dashboard.profile.profile', compact('profile'), 
        ['title' => 'Profile']);
    }

    public function show($id)
    {
        $profile = Profile::find($id);
        return view('dashboard.profile.detail', compact('profile'),
        ['title' => 'Profile']);
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('dashboard.profile.edit', compact('profile'), 
        ['title' => 'Profile']);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'pendiri' => 'required',
            'tahun' => 'required|max:4',
            'penanggung_jawab' => 'required',
            'profile' => 'image|file|max:2048|mimes:jpg,jpeg,png|required'
        ]);

        $extension = $request->file('profile')->getClientOriginalExtension();
        $profile = 'profile'. '-' . rand() . '.'. $extension;
        $path = $request->file('profile')->storeAs('profile', $profile, 'public');

        Profile::find($id)->update([
            'nama' => $request->nama,
            'pendiri' => $request->pendiri,
            'tahun' => $request->tahun,
            'penanggung_jawab' => $request->penanggung_jawab,
            'profile' => $profile
        ]);

        return redirect()->route('profile.index')->with('status', 'Data Profile Berhasil Di Update');
    }
}
