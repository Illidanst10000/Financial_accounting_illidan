<?php

namespace App\Http\Controllers\User\Spendings;

use Illuminate\Support\Facades\DB;

class IndexController extends BaseController
{
    public function __invoke()
    {

        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)->get();

        return view('user.spendings.index', compact('spendings'));
    }
}
