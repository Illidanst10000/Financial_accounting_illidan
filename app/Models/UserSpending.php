<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @OA\Schema(type="object"),
 */

class UserSpending extends Model
{
    /**
     *  @OA\Property(
     *      property="user_id",
     *      type="id",
     *  ),
     *  @OA\Property(
     *      property="spending_id",
     *      type="id",
     *  ),
     */
    use HasFactory;

    protected $table = 'user_spendings';
    protected $guarded = false;
}
