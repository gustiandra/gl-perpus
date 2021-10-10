<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowing extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'return_at' => 'datetime',
    ];

    public function book_code()
    {
        return $this->belongsTo(BookCode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
