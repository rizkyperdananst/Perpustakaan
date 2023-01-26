<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::all()->count();
        $book = Book::all()->count();
        return view('dashboard.dashboard', compact('student', 'book'), 
        ['title' => 'Dashboard']);
    }
}
