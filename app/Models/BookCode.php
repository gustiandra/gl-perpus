<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookCode extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function borrowed()
    {
        return $this->hasOne(Borrowing::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
