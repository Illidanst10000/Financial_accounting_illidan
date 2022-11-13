<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;
use App\Models\Source;

class ShowController extends Controller
{
    public function __invoke(Source $source)
    {
        return view('admin.sources.show', compact('source'));
    }
}
