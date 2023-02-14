<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpendingTag extends Model
{
    use HasFactory;

    protected $table = 'spending_tags';
    protected $guarded = false;
}
