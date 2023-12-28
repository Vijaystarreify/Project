<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
	protected $fillable = [
        'title',
        'user_id',
        'trailer_url',
        'image',
        'description',
        'release_date',
        'genre',
        'directors',
        'cast',
        'duration',
        'language',
        'country',
        'poster_image',
        'rating',
        'ticket_price',
        'showtimes',
        'theater_name',
        'location',
        'screen_number',
    ];
}
