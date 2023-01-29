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

class DeleteController extends Controller
{
    /**
     * @OA\Delete (
     * path="/earnings/{id}",
     * operationId="earningDelete",
     * summary="Delete Earning",
     * tags={"Earnings"},
     * description="Delete earning by ID",
     *
     *     @OA\Parameter (
     *          name="id",
     *          in="path",
     *          description="Earning ID",
     *          required=true,
     *            @OA\Schema(
     *               type="integer",
     *               required={"id"},
     *        ),
     *     ),
     *      @OA\Response(
     *          response=204,
     *          description="Deleted Successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     *
     *
     */

    public function __invoke(Earning $earning)
    {
        try {
            DB::beginTransaction();

            $earning->delete();

            $userId = auth()->user()->id;

            DB::table('user_balances')
                ->where('type_id', '=', $earning['type_id'])
                ->where('user_id', '=', $userId)
                ->decrement('balance', $earning['amount']);

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return response(204);
    }
}
