<?php

// app/Models/Theater.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    protected $fillable = ['name', 'location'];

    public function screens()
    {
        return $this->hasMany(Screen::class);
    }
}

