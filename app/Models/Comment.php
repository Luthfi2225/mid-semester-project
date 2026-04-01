<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment', 'user_id', 'news_id'];

    // Relasi balik ke Berita
    public function news()
    {
        return $this->belongsTo(News::class);
    }

    // Relasi balik ke User (Penulis komentar)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
