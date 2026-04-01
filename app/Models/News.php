<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory; // Tambahkan baris ini di dalam class

    protected $fillable = ['title', 'content', 'author', 'image', 'category', 'sub_category'];

    // Relasi: Satu berita punya banyak komentar
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
