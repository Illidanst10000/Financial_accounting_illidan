<?php

namespace App\Http\Controllers\User\Spendings;

use App\Models\Spending;
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
        return redirect()->route('user.spendings.index');
    }
}
