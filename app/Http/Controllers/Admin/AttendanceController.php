<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Attribute;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')) {
            $attendances = Attendance::where('nama', 'LIKE', '%'. $request->search .'%')->paginate(5);
        } else {
            $attendances = Attendance::paginate(5);
        }
        
        return view('dashboard.attendance.attendance', compact('attendances'),
        ['title' => 'Attendance']);
        
    }

    public function create()
    {
        $keterangan = 'Hadir';
        $tanggal = date('d-m-Y');
        date_default_timezone_set('Asia/Jakarta'); // Untuk mengatur waktu sesuai waktu di indonesia
        $time = date('H:i:s A');
        return view('dashboard.attendance.create', compact('keterangan', 'tanggal', 'time'), 
        ['title' => 'Attendance']);
    }
    
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'npm' => 'required|max:8',
            'kelas' => 'required|max:10',
            'jam' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]);

        Attendance::create($validate);
        return redirect()->route('attendance.create')->with('status', 'Data Absensi Berhasil Di Tambahkan');
    }
}
