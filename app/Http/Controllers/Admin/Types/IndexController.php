<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;

        $types = DB::table('types')
            ->join('user_types', 'types.id', '=', 'user_types.type_id')
            ->where('user_id', '=', $userId)->get();

        return view('admin.types.index', compact('types'));
    }
}
