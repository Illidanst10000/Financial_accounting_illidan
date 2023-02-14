<?php

namespace App\Http\Controllers\Admin\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;

class EditController extends BaseController
{
    public function __invoke(Spending $spending)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $types = Type::getTypes();
        return view('admin.spendings.edit', compact('spending', 'categories', 'tags', 'types'));
    }
}
