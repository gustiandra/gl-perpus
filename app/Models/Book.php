<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $casts = [
        'publish_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function bookCategory()
    {
        return $this->hasMany(BookCategory::class)->with('category');
    }

    public function rack()
    {
        return $this->hasOne(Rack::class, 'id', 'rack_id');
    }

    public function bookCode()
    {
        return $this->hasMany(BookCode::class);
    }
}
