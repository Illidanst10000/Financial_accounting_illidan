<?php

namespace App\Http\Controllers\User\Types;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class ShowController extends Controller
{
    public function __invoke(Type $type)
    {
        return view('user.types.show', compact('type'));
    }
}
