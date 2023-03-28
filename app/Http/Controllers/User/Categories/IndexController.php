<?php

namespace App\Http\Controllers\User\Categories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;

        $categories = DB::table('categories')
            ->join('user_categories', 'categories.id', '=', 'user_categories.category_id')
            ->where('user_id', '=', $userId)->get();

        return view('user.categories.index', compact('categories'));
    }
}
