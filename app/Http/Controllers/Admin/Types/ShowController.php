<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class ShowController extends Controller
{
    public function __invoke(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }
}
