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
 *     name="Spendings",
 * )
 */

class ShowController extends Controller
{
    /**
     * @OA\Get(
     *     path="/tags/{id}",
     *     summary="Get tag by id",
     *     tags={"Tags"},
     *     description="Get tag by id",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="Tag id",
     *         required=true,
     *              @OA\Schema(
     *               type="integer",
     *               required={"id"},
     *        ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *         @OA\JsonContent()
     *     ),
     * )
     *
     *
     */

    public function __invoke(Tag $tag)
    {
        $userId = auth()->user()->id;

        $tag = DB::table('tags')
            ->join('user_tags', 'tags.id', '=', 'user_tags.tag_id')
            ->where('user_id', '=', $userId)
            ->where('tag_id', '=', $tag->id)
            ->get();

        return response()->json($tag, 200);
    }
}
