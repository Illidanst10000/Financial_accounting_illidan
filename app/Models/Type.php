<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(type="object"),
 */


class Type extends Model
{
    use HasFactory;

    const TYPE_DEBIT = 0;
    const TYPE_CREDIT = 1;
    const TYPE_CASH = 2;
    const TYPE_DEBT = 3;

    protected $table = 'types';
    protected $guarded = false;

    public static function getTypes()
    {
        return [
            self::TYPE_DEBIT => 'Debit',
            self::TYPE_CREDIT => 'Credit',
            self::TYPE_CASH => 'Cash',
            self::TYPE_DEBT => 'Debt',
        ];
    }

}
