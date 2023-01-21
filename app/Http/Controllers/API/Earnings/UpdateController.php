<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Earnings\UpdateRequest;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Earning $earning)
    {
        $data = $request->validated();
        dd($data);
        try {
            DB::beginTransaction();

            $userId = auth()->user()->id;

            if (isset($data['source_id']))
            {
                $source_id = Source::where('title', $data['source_id'])->first()->id;
                $data['source_id'] = $source_id;
            }

            if (isset($data['type_id']))
            {
                $types = Type::getTypes();
                $types = array_flip($types);
                $data['type_id'] = $types[$data['type_id']];
            }

            $earning->update($data);

            DB::table('user_balances')
                ->where('type_id', '=', $earning['type_id'])
                ->where('user_id', '=', $userId)
                ->increment('balance', $data['amount'] - $earning['amount']);
            dd(1);
            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
