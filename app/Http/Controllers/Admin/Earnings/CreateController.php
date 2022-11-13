<?php

namespace App\Http\Controllers\Admin\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Models\Type;

class CreateController extends Controller
{
    public function __invoke()
    {
        $types = Type::all();
        $sources = Source::all();
        return view('admin.earnings.create', compact('types', 'sources'));
    }
}
