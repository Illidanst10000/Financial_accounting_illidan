<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Type;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }
}
