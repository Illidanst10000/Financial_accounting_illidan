<?php

namespace App\Http\Controllers\User\Transfers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Transfers\StoreRequest;
use App\Models\Type;
use App\Models\UserBalance;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $userId = auth()->user()->id;

            $userBalance = new UserBalance();

            $userBalance->decrementBalance($data['fromType_id'], $userId, $data['amount']);
            $userBalance->incrementBalance($data['toType_id'], $userId, $data['amount']);

            DB::commit();
        }
    catch (\Exception $exception) {
        DB::rollBack();
        abort(500);
    }

        return redirect()->route('main.index');
    }
}
