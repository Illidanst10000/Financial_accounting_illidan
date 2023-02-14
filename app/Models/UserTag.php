<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object"),
 */

class UserTag extends Model
{
    /**
     *  @OA\Property(
     *      property="user_id",
     *      type="id",
     *  ),
     *  @OA\Property(
     *      property="tag_id",
     *      type="id",
     *  ),
     */

    use HasFactory;

    protected $table = 'user_tags';
    protected $guarded = false;
}
