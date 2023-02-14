<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Schema(type="object"),
 */

class UserBalance extends Model
{
    /**
     *  @OA\Property(
     *      property="user_id",
     *      type="id",
     *  ),
     *  @OA\Property(
     *      property="balance",
     *      type="integer",
     *  ),
     *  @OA\Property(
     *      property="type_id",
     *      type="integer",
     *  ),
     */

    use HasFactory;

    protected $table = 'user_balances';
    protected $guarded = false;


    public function incrementBalance($typeId, $userId, $amount) {
        DB::table('user_balances')
            ->where('type_id', '=', $typeId)
            ->where('user_id', '=', $userId)
            ->increment('balance', $amount);
    }

    public function decrementBalance($typeId, $userId, $amount) {
        DB::table('user_balances')
            ->where('type_id', '=', $typeId)
            ->where('user_id', '=', $userId)
            ->decrement('balance', $amount);
    }
}
