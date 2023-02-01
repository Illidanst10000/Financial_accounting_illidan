<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;
use App\Models\Source;

class DeleteController extends Controller
{
    public function __invoke(Source $source)
    {
        $source->delete();
        return redirect()->route('admin.sources.index');
    }
}
