<?php

namespace App\Http\Controllers\API\Tags;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Tags",
 * )
 */

class IndexController extends Controller
{
    /**
     * @OA\Get(
     *     path="/tags",
     *     operationId="tagsList",
     *     tags={"Tags"},
     *     summary="Get list of tags",
     *     description="Get tags",
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *
     *     @OA\JsonContent()
     *     ),
     * )
     *
     */

    public function __invoke()
    {
        $userId = auth()->user()->id;

        $tags = DB::table('tags')
            ->join('user_tags', 'tags.id', '=', 'user_tags.tag_id')
            ->where('user_id', '=', $userId)
            ->get();

        return response()->json($tags, 200);
    }
}
