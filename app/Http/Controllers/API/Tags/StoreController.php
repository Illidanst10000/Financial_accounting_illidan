<?php

namespace App\Http\Controllers\API\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Tags\StoreRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class StoreController extends Controller
{

    /**
     * @OA\Post(
     * path="/tags",
     * operationId="tagCreate",
     * summary="Create tag",
     * tags={"Tags"},
     * description="Create tag",
     *     @OA\RequestBody(
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"title"},
     *               @OA\Property(property="title", type="string", example="McDonalds"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Created Successfully",
     *          @OA\JsonContent()
     *       )
     * )
     */

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::firstOrCreate($data);

        $userId = auth()->user()->id;
        $tag->userTags()->attach($userId);

        return response()->json($tag);;
    }
}
