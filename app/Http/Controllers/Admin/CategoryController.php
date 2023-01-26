<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.category.category', compact('categories'),
        ['title' => 'Category']);
    }

    public function create()
    {
        return view('dashboard.category.create', 
        ['title' => 'Category']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'category' => 'required'
        ]);

        Category::create($validate);
        return redirect()->route('category.index')->with('status', 'Data Category Berhasil Di Tambahkan');
    }

    public function destroy($id)
    {
        Category::find($id)->delete();
        return redirect()->route('category.index')->with('status', 'Data Category Berhasil Di Hapus');
    }
}
