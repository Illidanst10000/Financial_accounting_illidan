<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Spendings\StoreRequest;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
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

            DB::table('user_balances')
                ->where('type_id', '=', $spending['type_id'])
                ->where('user_id', '=', $userId)
                ->decrement('balance', $spending['amount']);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        // TODO have to make exception and respones in all api controller
        return response($spending);
    }
}
