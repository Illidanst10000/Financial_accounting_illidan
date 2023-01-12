<?php

namespace App\Http\Controllers\Admin\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    public function __invoke(Earning $earning)
    {
        try {
            DB::beginTransaction();

            $earning->delete();

            $userId = auth()->user()->id;
            DB::table('user_balances')
                ->where('type_id', '=', $earning['type_id'])
                ->where('user_id', '=', $userId)
                ->decrement('balance', $earning['amount']);

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return redirect()->route('admin.earnings.index');
    }
}
