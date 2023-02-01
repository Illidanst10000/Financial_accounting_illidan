<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use App\Models\UserEarning;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Earnings",
 * )
 */

class IndexController extends Controller
{
    public function __invoke()
    {
        /**
         * @OA\Get(
         *     path="/earnings",
         *     operationId="earningsList",
         *     tags={"Earnings"},
         *     summary="Get list of earnings",
         *     description="Get earnings",
         *     @OA\Response(
         *         response="200",
         *         description="Everything is fine",
         *
         *     @OA\JsonContent()
         *     ),
         * )
         *
         */

       $userId = auth()->user()->id;

       $earnings = DB::table('earnings')
           ->join('user_earnings', 'earnings.id', '=', 'user_earnings.earning_id')
           ->where('user_id', '=', $userId)
           ->get();

        return response()->json($earnings, 200);
    }

    // TODO have to make api documentation
}
