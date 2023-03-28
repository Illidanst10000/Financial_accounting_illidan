<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object"),
 */


class Type extends Model
{
    use HasFactory;

    protected $table = 'types';
    protected $guarded = false;

    public function userTypes() {
        return $this->belongsToMany(User::class, 'user_types');
    }

}
