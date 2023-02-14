<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Earnings",
 * )
 */

class ShowController extends Controller
{
    /**
     * @OA\Get(
     *     path="/earnings/{id}",
     *     summary="Get earning by id",
     *     tags={"Earnings"},
     *     description="Get earning by id",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Earning id",
     *         required=true,
     *              @OA\Schema(
     *               type="integer",
     *               required={"id"},
     *        ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent()
     *     ),
     * )
     *
     *
     */

    public function __invoke(Earning $earning)
    {
        $userId = auth()->user()->id;

        $earning = DB::table('earnings')
            ->join('user_earnings', 'earnings.id', '=', 'user_earnings.earning_id')
            ->where('user_id', '=', $userId)
            ->where('earning_id', '=', $earning->id)
            ->get();

        return response()->json($earning, 200);

    }
}
