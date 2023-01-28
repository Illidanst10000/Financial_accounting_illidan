<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Type;

class DeleteController extends Controller
{
    public function __invoke(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
