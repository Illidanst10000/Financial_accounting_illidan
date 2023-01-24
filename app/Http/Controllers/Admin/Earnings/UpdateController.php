<?php

namespace App\Http\Controllers\Admin\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Earnings\UpdateRequest;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Earning $earning)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();

            $earning->update($data);

            $userId = auth()->user()->id;
            DB::table('user_balances')
                ->where('type_id', '=', $earning['type_id'])
                ->where('user_id', '=', $userId)
                ->increment('balance', $data['amount'] - $earning['amount']);

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return redirect()->route('admin.earnings.show', compact('earning'));
    }
}
