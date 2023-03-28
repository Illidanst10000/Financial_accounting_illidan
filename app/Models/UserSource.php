<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(type="object"),
 */
class UserSource extends Model
{
    /**
     *  @OA\Property(
     *      property="user_id",
     *      type="id",
     *  ),
     *  @OA\Property(
     *      property="source_id",
     *      type="id",
     *  ),
     */
    use HasFactory;

    protected $table = 'user_sources';
    protected $guarded = false;
}
