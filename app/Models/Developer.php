<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    protected $primaryKey = 'dev_id';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function genre()
    {
        return $this->belongsTo((Genre::class));

    }
    public function game()
    {
        return $this->hasMany((Game::class));

    }
}
