<?php

// app/Models/Theater.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    protected $fillable = ['name', 'theater_id'];

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
}

