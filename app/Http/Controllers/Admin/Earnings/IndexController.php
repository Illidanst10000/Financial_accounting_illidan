<?php

namespace App\Http\Controllers\Admin\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke()
    {
        $earnings = Earning::all();
        return view('admin.earnings.index', compact('earnings'));
    }
}
