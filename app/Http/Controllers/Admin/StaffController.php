<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = Staff::all();
        return view('dashboard.staff.staff', compact('staffs'),
        ['title' => 'Staff']);
    }

    public function create()
    {
        $data = Staff::latest('jabatan')->first();
        if(!$data) {
            $jabatan = 'Ketua Staff';
        } else {
            $jabatan = 'Staff Biasa';
        }
        return view('dashboard.staff.create', compact('jabatan'),
        ['title' => 'Staff']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required'
        ]);

        Staff::create($validate);
        return redirect()->route('staff.index')->with('status', 'Data Staff Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $staff = Staff::find($id);
        return view('dashboard.staff.edit', compact('staff'),
        ['title' => 'Staff']);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'jabatan' => 'required'
        ]);

        Staff::find($id)->update($validate);
        return redirect()->route('staff.index')->with('status', 'Data Staff Berhasil Di Edit');
    }

    public function destroy($id)
    {
        Staff::find($id)->delete();
        return redirect()->route('staff.index')->with('status', 'Data Staff Berhasil Di Hapus');
    }
}
