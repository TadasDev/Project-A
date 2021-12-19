<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookReviews extends Model
{
    use HasFactory;

    protected $table= 'books_reviews';

    protected $fillable = ['book_id','comment','user_id'];
}
