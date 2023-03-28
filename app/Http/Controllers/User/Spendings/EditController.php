<?php

namespace App\Http\Controllers\User\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class EditController extends BaseController
{
    public function __invoke(Spending $spending)
    {
        $userId = auth()->user()->id;

        $types = Type::join('user_types', 'types.id', '=', 'user_types.type_id')
            ->where('user_id', '=', $userId)->get();

        $categories = Category::join('user_categories', 'categories.id', '=', 'user_categories.category_id')
            ->where('user_id', '=', $userId)->get();

        $tags = Tag::join('user_tags', 'tags.id', '=', 'user_tags.tag_id')
            ->where('user_id', '=', $userId)->get();

        return view('user.spendings.edit', compact('spending', 'categories', 'tags', 'types'));
    }
}
