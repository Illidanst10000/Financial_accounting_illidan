<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object"),
 */

class Tag extends Model
{
    /**
     *  @OA\Property(
     *      property="title",
     *      type="string",
     *  )
     */

    use HasFactory;


    protected $table = 'tags';
    protected $guarded = false;

    public function userTags() {
        return $this->belongsToMany(User::class, 'user_tags');
    }
}
