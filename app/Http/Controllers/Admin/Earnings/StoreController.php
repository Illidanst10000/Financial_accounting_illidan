<?php

namespace App\Http\Controllers\Admin\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Earnings\StoreRequest;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
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

            $userId = auth()->user()->id;
            $earning = Earning::firstOrCreate($data);
            $earning->userEarnings()->attach($userId);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return redirect()->route('admin.earnings.index');

    }
}
