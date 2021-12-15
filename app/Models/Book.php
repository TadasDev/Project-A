<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table= 'books';

    protected $fillable=[
        'title' ,
        'description',
        'price',
    ];

    public function images()
    {
        return $this->hasMany(BookImages::class);
    }
}
