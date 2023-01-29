<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object"),
 */

class SpendingTag extends Model
{
    /**
     *  @OA\Property(
     *      property="spending_id",
     *      type="id",
     *  ),
     *  @OA\Property(
     *      property="tag_id",
     *      type="id",
     *  ),
     */
    use HasFactory;

    protected $table = 'spending_tags';
    protected $guarded = false;
}
