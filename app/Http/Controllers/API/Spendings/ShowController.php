<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Spendings",
 * )
 */

class ShowController extends Controller
{
    /**
     * @OA\Get(
     *     path="/spendings/{id}",
     *     summary="Get spending by id",
     *     tags={"Spendings"},
     *     description="Get spending by id",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Spending id",
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

    public function __invoke(Spending $spending)
    {
        $userId = auth()->user()->id;

        $spending = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->where('spending_id', '=', $spending->id)
            ->get();

        return response()->json($spending, 200);
    }
}
