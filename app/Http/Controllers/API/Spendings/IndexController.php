<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Spendings",
 * )
 */

class IndexController extends Controller

{
    /**
     * @OA\Get(
     *     path="/spendings",
     *     operationId="spendingsList",
     *     tags={"Spendings"},
     *     summary="Get list of spendings",
     *     description="Get spendings",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *
     *     @OA\JsonContent()
     *     ),
     * )
     *
     */

    public function __invoke()
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->get();

        return response()->json($spendings, 200);
    }
}
