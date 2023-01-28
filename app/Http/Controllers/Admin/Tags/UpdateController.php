<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\UpdateRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Type;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        return redirect()->route('admin.categories.show', compact('category'));
    }
}
