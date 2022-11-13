<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }
}
