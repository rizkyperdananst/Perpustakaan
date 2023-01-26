<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Borrow;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('students')->orderBy('id', 'desc')->get();
        return view('dashboard.borrow.borrow', compact('borrows'),
        ['title' => 'Borrow']);
    }

    public function create()
    {
        $students = Student::all();
        $categories = Category::all();
        $books = Book::all();
        $staffs = Staff::all();
        $peminjaman = date('d-F-Y');
        $pengembalian = date('d-F-Y', strtotime('+7 day', strtotime(date('d-m-Y'))));
        $status = 'Meminjam';
        return view('dashboard.borrow.create', compact('students', 'categories', 'books', 'staffs', 'peminjaman', 'pengembalian', 'status'),
        ['title' => 'Borrow']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'student_id'=> 'required',
            'book_id' => 'required',
            'peminjaman' => 'required',
            'pengembalian' => 'required',
            'staff_id' => 'required',
            'status' => 'required'
        ]);

        Borrow::create($validate);
        return redirect()->route('borrow.index')->with('status', 'Data Borrow Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $borrow = Borrow::find($id);
        $students = Student::all();
        $categories = Category::all();
        $books = Book::all();
        $staffs = Staff::all();
        $peminjaman = date('d-F-Y');
        $pengembalian = date('d-F-Y', strtotime('+7 day', strtotime(date('d-m-Y'))));
        $status = 'Meminjam';
        return view('dashboard.borrow.edit', compact('borrow', 'students', 'books', 'staffs', 'peminjaman', 'pengembalian', 'status'),
        ['title' => 'Borrow']);
    }

    public function update(Request $request, $id) 
    {
        $validate = $request->validate([
            'student_id'=> 'required',
            'book_id' => 'required',
            'peminjaman' => 'required',
            'pengembalian' => 'required',
            'staff_id' => 'required',
            'status' => 'required'
        ]);

        Borrow::find($id)->update($validate);
        return redirect()->route('borrow.index')->with('status', 'Data Borrow Berhasil Di Update');
    }

    public function destroy($id)
    {
        Borrow::find($id)->delete();
        return redirect()->route('borrow.index')->with('status', 'Data Borrow Berhasil Di Hapus');
    }
}
