<?php

namespace App\Http\Controllers\API\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use App\Models\UserEarning;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
       $userId = auth()->user()->id;

       $earnings = DB::table('earnings')
           ->join('user_earnings', 'earnings.id', '=', 'user_earnings.earning_id')
           ->where('user_id', '=', $userId)
           ->get();

        return response()->json($earnings);
    }

    // TODO have to make api documentation
}
