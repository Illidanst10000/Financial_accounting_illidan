<?php

namespace App\Http\Controllers\API\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Tags\UpdateRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

/**
 * @OA\Tag(
 *     name="Tags",
 * )
 */

class UpdateController extends Controller
{
    /**
     * @OA\PATCH (
     * path="/tags/{id}",
     * operationId="tagUpdate",
     * summary="Update Tag",
     * tags={"Tags"},
     * description="Update Tag by ID",
     *     @OA\Parameter (
     *          name="id",
     *          in="path",
     *          description="Tag ID",
     *          required=true,
     *            @OA\Schema(
     *               type="integer",
     *               required={"id"},
     *        ),
     *     ),
     *     @OA\RequestBody(
     *            @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *
     *               @OA\Property(property="title", type="string", example="McDonalds"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Updated Successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     */

    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);

        return response($tag);
    }
}
