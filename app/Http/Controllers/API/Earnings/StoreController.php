<?php

namespace App\Http\Controllers\User\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Earnings\StoreRequest;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $earning = Earning::firstOrCreate($data);

        $userId = auth()->user()->id;
        $earning->userEarnings()->attach($userId);

        return redirect()->route('user.earnings.index');
    }
}
