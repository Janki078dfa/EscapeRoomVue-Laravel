<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'players',
    ];

    protected $table = "games";
    /*
        public function rooms()
        {
            return $this->hasMany(Room::class);
        }
    */
}
