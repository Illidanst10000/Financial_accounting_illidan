<?php

namespace App\Http\Controllers\Admin\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Type;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $types = Type::getTypes();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.spendings.create', compact('types','categories', 'tags'));
    }
}
