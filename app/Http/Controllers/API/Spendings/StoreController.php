<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Spendings\StoreRequest;
use App\Models\Spending;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Spendings",
 * )
 */

class StoreController extends Controller
{
    /**
     * @OA\Post(
     * path="/spendings",
     * operationId="spendingCreate",
     * summary="Create Spending",
     * tags={"Spendings"},
     * description="Create Spending",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"amount", "date", "source_id", "type_id"},
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
     *          description="Created Successfully",
     *          @OA\JsonContent()
     *       )
     * )
     */

    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $spending = Spending::firstOrCreate($data);

            if (isset($tagIds)) {
                $spending->tags()->attach($tagIds);
            }

            $userId = auth()->user()->id;
            $spending->userSpendings()->attach($userId);


            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        // TODO have to make exception and responses in all api controller

        return response($spending, 201);

    }
}
