<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;

use App\Http\Requests\API\Spendings\UpdateRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{

    /**
     * @OA\PATCH (
     * path="/spendings/{id}",
     * operationId="spendingUpdate",
     * summary="Update Spending",
     * tags={"Spendings"},
     * description="Update Spending by ID",
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
     *     @OA\RequestBody(
     *            @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *
     *               @OA\Property(property="amount", type="integer", example="100"),
     *               @OA\Property(property="date", type="date", example="2023-01-28"),
     *               @OA\Property(property="category_id", type="id", example="1"),
     *               @OA\Property(property="type_id", type="id", example="1"),
     *               @OA\Property(property="tag_ids", type="array", @OA\Items(), example="[""McDonalds"", ""BurgerKing"", ""KFC""]"),
     *               @OA\Property(property="description", type="string", example="Example description"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Updated Successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     */

    public function __invoke(UpdateRequest $request, Spending $spending)
    {

        $data = $request->validated();

        try {
            DB::beginTransaction();

            $userId = auth()->user()->id;

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $spending->update($data);

            if (isset($tagIds)) {
                $spending->tags()->sync($tagIds);
            }

            DB::table('user_balances')
                ->where('type_id', '=', $spending['type_id'])
                ->where('user_id', '=', $userId)
                ->increment('balance', $data['amount'] - $spending['amount']);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return response($spending, 201);
    }
}
