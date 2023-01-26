<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class BookController extends Controller
{   
    public function index(Request $request)
    {
        // $books = Book::with('categories')->orderBy('id', 'desc')->get();
        if($request->has('search')) {
            $books = Book::where('judul', 'LIKE', '%'. $request->search .'%')->paginate(5);
        } else {
            $books = Book::paginate(5);
        }
        return view('dashboard.book.book', compact('books'),
        ['title' => 'Book']);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.book.create', compact('categories'),
        ['title' => 'Book']);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'image' => 'image|file|max:2048|mimes:jpg,jpeg,png|required',
            'category_id' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required|max:4'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $image = 'cover' . '-' . rand() . '.' .$extension;
        $path = $request->file('image')->storeAs('covers', $image, 'public');

        Book::create([
            'image' => $image,
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('book.index')->with('status', 'Data Book Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $book = Book::find($id);
        $categories = Category::all();
        return view('dashboard.book.edit', compact('book', 'categories'),
        ['title' => 'Book']);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'image' => 'image|file|max:2048|mimes:jpg,jpeg,png|required',
            'category_id' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required|max:4'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $image = 'cover' . '-' . rand(). '.' .$extension;
        $path = $request->file('image')->storeAs('covers', $image, 'public');

        $book = Book::find($id);
        $destination = 'covers'. $book->image;
        if(File::exists($destination)){
            File::delete($destination);
        }

        Book::find($id)->update([
            'image' => $image,
            'category_id' => $request->category_id,
            'judul' => $request->judul,
            'penerbit' => $request->penerbit,
            'pengarang' => $request->pengarang,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('book.index')->with('status', 'Data Book Berhasil Di Edit');
    }

    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('book.index')->with('status', 'Data Book Berhasil Di Hapus');
    }
}
