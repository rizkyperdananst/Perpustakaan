<?php

namespace App\Http\Controllers\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('dashboard.student.student', compact('students'), 
        ['title' => 'Student']);
    }

    public function create()
    {
        $faculties = Faculty::orderBy('fakultas', 'asc')->select('id', 'fakultas')->get();
        $jurusan = Major::all();
        
        return view('dashboard.student.create', compact('faculties', 'jurusan'), 
        ['title' => 'Student']);
    }

    // public function getJurusan($fakultasid=0)
    // {
    //     $empData['data'] = Major::orderBy('jurusan', 'asc')->select('id', 'jurusan')->where('fakultas', $fakultasid)->get();

    //     return response()->json($empData);
    // }

    public function getJurusan($fakultastid=0)
    {
        // Fetch Employee by Departmentid
        $empData['data'] = Major::orderBy('jurusan', 'asc')->select('id', 'jurusan')->where('fakultas', $fakultastid)->get();

        return response()->json($empData);
    }

    public function getJurusanEdit($fakultastidEdit=0)
    {
        // Fetch Employee by Departmentid
        $empDataEdit['data'] = Major::orderBy('jurusan', 'asc')->select('id', 'jurusan')->where('fakultas', $fakultastidEdit)->get();

        return response()->json($empDataEdit);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'profile' => 'image|file|max:2048|mimes:jpg,jpeg,png|required',
            'nama' => 'required',
            'npm' => 'required|max:8',
            'kelas' => 'required|max:10',
            'fakultas' => 'required',
            'jurusan' => 'required'
        ]);

        // $extension = $request->file('profile')->getClientOriginalExtension();
        // $profile = 'profile' . rand(). $extension;

        $extension = $request->file('profile')->getClientOriginalExtension();
        $profile = 'student' . '-' . rand(). '.' .$extension;
        $path = $request->file('profile')->storeAs('students', $profile, 'public');

        Student::create([
            'profile' => $profile,
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas' => $request->kelas,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan
        ]);

        return redirect()->route('student')->with('status', 'Data Student Berhasil Di Tambahkan');
    }

    public function show($id)
    {
        $student = Student::find($id);
        // dd($student);
        return view('dashboard.student.detail', compact('student'), 
        ['title' => 'Student']);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        $faculties = Faculty::all();
        $majors = Major::all();

        return view('dashboard.student.edit', compact('student', 'faculties', 'majors'), 
        ['title' => 'Student']);
    }

    public function update(Request $request,$id)
    {
        $validate = $request->validate([
            'profile' => 'image|file|max:2048|mimes:jpg,jpeg,png|required',
            'nama' => 'required',
            'npm' => 'required|max:8',
            'kelas' => 'required|max:10',
            'fakultas' => 'required',
            'jurusan' => 'required'
        ]);

        $student_profile = Student::find($id);
        $destination = 'students'. $student_profile->profile;
        if(File::exists($destination)) {
            File::delete($destination);
        }

        $extension = $request->file('profile')->getClientOriginalExtension();
        $profile = 'student' . '-' . date('d-M-Y'). '.' .$extension;
        $path = $request->file('profile')->storeAs('students', $profile, 'public');

        Student::find($id)->update([
            'profile' => $profile,
            'nama' => $request->nama,
            'npm' => $request->npm,
            'kelas' => $request->kelas,
            'fakultas' => $request->fakultas,
            'jurusan' => $request->jurusan
        ]);

        return redirect()->route('student.index')->with('status', 'Data Student Berhasil Di Update');
    }

    public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->route('student')->with('status', 'Data Student Berhasil Di Hapus');
    }
}
