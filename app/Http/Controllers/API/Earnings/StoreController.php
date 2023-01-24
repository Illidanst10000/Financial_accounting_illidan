<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Earnings\StoreRequest;
use App\Models\Earning;
use App\Models\Source;
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

        return response(201);
    }
}
