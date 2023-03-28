<?php

namespace App\Http\Controllers\User\Sources;

use App\Http\Controllers\Controller;
use App\Models\Source;

class DeleteController extends Controller
{
    public function __invoke(Source $source)
    {
        $source->delete();
        return redirect()->route('user.sources.index');
    }
}
