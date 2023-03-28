<?php

namespace App\Http\Controllers\User\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Type;

class ShowController extends Controller
{
    public function __invoke(Category $category)
    {
        return view('user.categories.show', compact('category'));
    }
}
