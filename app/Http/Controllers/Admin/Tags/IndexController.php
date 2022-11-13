<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }
}
