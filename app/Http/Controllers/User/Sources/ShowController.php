<?php

namespace App\Http\Controllers\User\Sources;

use App\Http\Controllers\Controller;
use App\Models\Source;

class ShowController extends Controller
{
    public function __invoke(Source $source)
    {
        return view('user.sources.show', compact('source'));
    }
}
