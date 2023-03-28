<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\API\Earnings\UpdateRequest;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Earnings",
 * )
 */

class UpdateController extends Controller
{
    /**
     * @OA\PATCH (
     * path="/earnings/{id}",
     * operationId="earningUpdate",
     * summary="Update Earning",
     * tags={"Earnings"},
     * description="Update Earning by ID",
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
     *     @OA\RequestBody(
     *            @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *
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
     *          description="Updated Successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     */

    public function __invoke(UpdateRequest $request, Earning $earning)
    {

        $data = $request->validated();

        try {
            DB::beginTransaction();

            $earning->update($data);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return response($earning, 201);

    }
}
