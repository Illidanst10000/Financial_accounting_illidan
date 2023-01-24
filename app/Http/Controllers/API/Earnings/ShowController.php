<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(Earning $earning)
    {
        $userId = auth()->user()->id;

        $earnings = DB::table('earnings')
            ->join('user_earnings', 'earnings.id', '=', 'user_earnings.earning_id')
            ->where('user_id', '=', $userId)
            ->where('earning_id', '=', $earning->id)
            ->get();

        return response()->json($earnings);
    }
}
