<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserBalance extends Model
{
    use HasFactory;

    protected $table = 'user_balances';
    protected $guarded = false;

    // TODO: i have to know is that right or its shit
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
