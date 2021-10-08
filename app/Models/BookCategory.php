<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}
