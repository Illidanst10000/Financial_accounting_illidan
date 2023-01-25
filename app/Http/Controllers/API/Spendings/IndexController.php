<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->get();

        return response()->json($spendings);

        // Todo make show and index in every api controller with good for understanding style for categories, types, tags

    }
}
