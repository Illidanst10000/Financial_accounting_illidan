<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object"),
 */

class UserCategory extends Model
{
    /**
     *  @OA\Property(
     *      property="user_id",
     *      type="id",
     *  ),
     *  @OA\Property(
     *      property="category_id",
     *      type="id",
     *  ),
     */
    use HasFactory;

    protected $table = 'user_categories';
    protected $guarded = false;
}
