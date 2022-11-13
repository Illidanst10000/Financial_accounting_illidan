<?php

namespace App\Http\Controllers\Admin\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class ShowController extends Controller
{
    public function __invoke(Earning $earning)
    {
        return view('admin.earnings.show', compact('earning'));
    }
}
