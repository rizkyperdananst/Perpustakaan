<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::all();
        return view('dashboard.admin.admin', compact('admins'), 
        ['title' => 'Admin']);
    }

    public function create()
    {
        return view('dashboard.admin.create', 
        ['title' => 'Admin']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admin.index')->with('status', 'Data Admin Berhasil Di Tambahkan');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.index')->with('status', 'Data Admin Berhasil Di Hapus');

    }

}

