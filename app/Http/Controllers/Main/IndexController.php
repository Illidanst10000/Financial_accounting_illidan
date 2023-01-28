<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\UserBalance;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        $balances = UserBalance::all()->where('user_id', '=', $userId)->pluck('balance')->toArray();
        $types = Type::getTypes();

        foreach ($types as $id => $type) {

            $balances[$type] = $balances[$id];
            unset($balances[$id]);
        }

        return view('main.index', compact('balances'));
    }
}
