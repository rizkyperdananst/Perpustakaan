<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['student_id', 'book_id', 'peminjaman', 'pengembalian', 'staff_id', 'status'];

    public function students()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function books()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function staffs()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}
