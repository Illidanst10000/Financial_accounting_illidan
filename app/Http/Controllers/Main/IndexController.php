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

        $types = Type::all();

        return view('main.index');
    }
}
