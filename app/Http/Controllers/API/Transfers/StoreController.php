<?php

namespace App\Http\Controllers\API\Transfers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Transfers\StoreRequest;
use App\Models\Type;
use App\Models\UserBalance;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Transfers",
 * )
 */

class StoreController extends Controller
{
    /**
     * @OA\Post(
     * path="/transfers",
     * operationId="transferCreate",
     * summary="Create transfer",
     * tags={"Transfers"},
     * description="Create transfer",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"amount", "fromType_id", "toType_id"},
     *               @OA\Property(property="amount", type="integer", example="100"),
     *               @OA\Property(property="fromType_id", type="integer", example="0"),
     *               @OA\Property(property="toType_id", type="integer", example="1"),
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

            $userId = auth()->user()->id;

            $userBalance = new UserBalance();

            $userBalance->decrementBalance($data['fromType_id'], $userId, $data['amount']);
            $userBalance->incrementBalance($data['toType_id'], $userId, $data['amount']);

            DB::commit();
        }
    catch (\Exception $exception) {
        DB::rollBack();
        abort(500);
    }

        return response(201);
    }
}
