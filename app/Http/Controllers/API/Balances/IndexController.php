<?php

namespace App\Http\Controllers\API\Balances;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use App\Models\UserBalance;
use App\Models\UserEarning;
use Illuminate\Support\Facades\DB;


/**
 * @OA\Tag(
 *     name="Balances",
 * )
 */

class IndexController extends Controller
{
    /**
     * @OA\Get(
     *     path="/balances",
     *     operationId="userBalance",
     *     tags={"Balances"},
     *     summary="Get user balance",
     *     description="Get balance",
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
        $types = Type::all();


        return response()->json(1);

    }

}
