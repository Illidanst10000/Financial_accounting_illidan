<?php

namespace App\Http\Controllers\User\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Earnings\StoreRequest;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use App\Models\UserBalance;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $userId = auth()->user()->id;

        try {
            DB::beginTransaction();

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

        return redirect()->route('user.earnings.index');
    }
}
