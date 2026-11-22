<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'slug', 'author', 'year', 'description', 'is_available'];

    protected $casts = ['is_available' => 'boolean'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
