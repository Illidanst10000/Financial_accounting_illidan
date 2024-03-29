<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Earnings\StoreRequest;
use App\Models\Earning;

use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Earnings",
 * )
 */

class StoreController extends Controller
{
    /**
     * @OA\Post(
     * path="/earnings",
     * operationId="earningCreate",
     * summary="Create Earning",
     * tags={"Earnings"},
     * description="Create Earning",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"amount", "date", "source_id", "type_id"},
     *               @OA\Property(property="amount", type="integer", example="100"),
     *               @OA\Property(property="date", type="date", example="2023-01-28"),
     *               @OA\Property(property="source_id", type="id", example="1"),
     *               @OA\Property(property="type_id", type="id", example="1"),
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

            $userId = auth()->user()->id;

            $earning = Earning::firstOrCreate($data);
            $earning->userEarnings()->attach($userId);


            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return response($earning,201);

    }
}
