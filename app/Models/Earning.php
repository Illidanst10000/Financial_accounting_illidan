<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object"),
 */

class Earning extends Model
{
    /**
     *  @OA\Property(
     *      property="amount",
     *      type="integer",
     *  ),
     *  @OA\Property(
     *      property="description",
     *      type="string",
     *  ),
     *  @OA\Property(
     *      property="date",
     *      type="date",
     *  ),
     *  @OA\Property(
     *      property="source_id",
     *      type="id",
     *  ),
     *  @OA\Property(
     *      property="type_id",
     *      type="integer",
     *  )
     */

    use HasFactory;

    protected $table = 'earnings';
    protected $guarded = false;

    public function userEarnings() {
        return $this->belongsToMany(User::class, 'user_earnings');
    }
}
