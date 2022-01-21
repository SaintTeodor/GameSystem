<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');

    }
    public function developer()
    {
        return $this->belongsTo(Developer::class, 'dev_id');

    }

}
