<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Earning extends Model
{
    use HasFactory;

    protected $table = 'earnings';
    protected $guarded = false;


    public function userEarnings() {
        return $this->belongsToMany(User::class, 'user_earnings');
    }
}
