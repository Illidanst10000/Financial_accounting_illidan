<?php

namespace App\Http\Controllers\User\Sources;

use App\Http\Controllers\Controller;
use App\Models\Source;

class EditController extends Controller
{
    public function __invoke(Source $source)
    {
        return view('user.sources.edit', compact('source'));
    }
}
