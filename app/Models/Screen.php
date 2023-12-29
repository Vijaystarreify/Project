<?php

// app/Models/Theater.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    protected $fillable = ['name','capacity','theater_id'];

    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }

    public function shows()
    {
        return $this->hasMany(Show::class);
    }
}

