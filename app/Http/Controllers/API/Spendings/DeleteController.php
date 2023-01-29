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

class DeleteController extends Controller

{
    /**
     * @OA\Delete (
     * path="/spednings/{id}",
     * operationId="spedningDelete",
     * summary="Delete Spending",
     * tags={"Spendings"},
     * description="Delete spedning by ID",
     *
     *     @OA\Parameter (
     *          name="id",
     *          in="path",
     *          description="Spending ID",
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

    public function __invoke(Spending $spending)
    {
        try {
            DB::beginTransaction();

            $spending->delete();

            $userId = auth()->user()->id;

            DB::table('user_balances')
                ->where('type_id', '=', $spending['type_id'])
                ->where('user_id', '=', $userId)
                ->increment('balance', $spending['amount']);

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return response(204);

    }
}
