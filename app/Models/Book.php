<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'isbn',
        'price',
        'title',
        'genre',
        'author',
        'premis',
        'language',
        'publisher',
        'number_of_page',
        'date_of_issue'
    ];
}