<?php

namespace App\Http\Controllers\API\Tags;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $userId = auth()->user()->id;

        $tag = DB::table('tags')
            ->join('user_tags', 'tags.id', '=', 'user_tags.tag_id')
            ->where('user_id', '=', $userId)
            ->where('tag_id', '=', $tag->id)
            ->get();

        return response()->json($tag);
    }
}
