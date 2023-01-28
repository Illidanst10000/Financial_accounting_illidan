<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Type;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }
}
