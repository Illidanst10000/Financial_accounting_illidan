<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class ShowController extends BaseController
{
    public function __invoke(Spending $spending)
    {

        $userId = auth()->user()->id;

        $spending = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->where('spending_id', '=', $spending->id)
            ->get();

        return response()->json($spending);

    }
}
