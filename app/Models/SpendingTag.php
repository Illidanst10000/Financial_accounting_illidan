<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpendingTag extends Model
{
    use HasFactory;

    protected $table = 'spending_tags';
    protected $guarded = false;
}
