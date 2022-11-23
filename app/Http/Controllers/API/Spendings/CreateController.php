<?php

namespace App\Http\Controllers\User\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends BaseController
{
    public function __invoke()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('user.spendings.create', compact('categories', 'tags'));
    }
}
