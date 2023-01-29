<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Earnings\StoreRequest;
use App\Models\Category;
use App\Models\Earning;

use App\Models\Source;
use App\Models\Type;
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
        $userId = auth()->user()->id;

        try {

            DB::beginTransaction();
            $source_id = Source::where('title', $data['source_id'])->first()->id;
            $data['source_id'] = $source_id;

            $types = Type::getTypes();
            $types = array_flip($types);
            $data['type_id'] = $types[$data['type_id']];

            $earning = Earning::firstOrCreate($data);
            $earning->userEarnings()->attach($userId);

            DB::table('user_balances')
                ->where('type_id', '=', $earning['type_id'])
                ->where('user_id', '=', $userId)
                ->increment('balance', $earning['amount']);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return response($earning,201);

    }
}
