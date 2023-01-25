<?php

namespace App\Http\Controllers\API\Balances;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use App\Models\UserBalance;
use App\Models\UserEarning;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        $types = Type::getTypes();

        $balances = DB::table('user_balances')
            ->where('user_id', '=', $userId)
            ->get()
            ->toArray();


        foreach ($types as $type_id => $type)
        {
                    $balances[$type_id]->type_id = $type;
        }

        return response()->json($balances);
    }

}
