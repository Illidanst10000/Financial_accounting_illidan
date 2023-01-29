<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object"),
 */

class Spending extends Model
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
     *      property="category_id",
     *      type="id",
     *  ),
     *  @OA\Property(
     *      property="type_id",
     *      type="integer",
     *  )
     */

    use HasFactory;

    protected $table = 'spendings';
    protected $guarded = false;

    public function tags() {
        return $this->belongsToMany(Tag::class, 'spending_tags');
    }

    public function userSpendings() {
        return $this->belongsToMany(User::class, 'user_spendings');
    }

}
