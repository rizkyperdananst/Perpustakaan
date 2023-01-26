<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['image', 'category_id', 'judul', 'penerbit', 'pengarang', 'tahun'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
