<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;
use App\Models\Source;

class IndexController extends Controller
{
    public function __invoke()
    {
        $sources = Source::all();
        return view('admin.sources.index', compact('sources'));
    }
}
