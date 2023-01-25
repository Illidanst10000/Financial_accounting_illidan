<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class DeleteController extends BaseController
{
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
        return response(200);

    }
}
