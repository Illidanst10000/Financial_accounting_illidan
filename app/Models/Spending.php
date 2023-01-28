<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spending extends Model
{
    use HasFactory;

    protected $table = 'spendings';
    protected $guarded = false;

    public function tags() {
        return $this->belongsToMany(Tag::class, 'spending_tags');
    }

    public function userSpendings() {
        return $this->belongsToMany(User::class, 'user_spendings');
    }
}
