<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSpending extends Model
{
    use HasFactory;


    protected $table = 'user_spendings';
    protected $guarded = false;
}
