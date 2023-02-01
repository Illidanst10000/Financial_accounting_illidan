<?php

namespace App\Http\Controllers\API\Tags;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

/**
 * @OA\Tag(
 *     name="Tags",
 * )
 */

class DeleteController extends Controller
{
    /**
     * @OA\Delete (
     * path="/tags/{id}",
     * operationId="tagDelete",
     * summary="Delete Tag",
     * tags={"Tags"},
     * description="Delete tag by ID",
     *
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
     *      @OA\Response(
     *          response=204,
     *          description="Deleted Successfully",
     *          @OA\JsonContent()
     *       ),
     * )
     *
     *
     */

    public function __invoke(Tag $tag)
    {
        $tag->delete();
        return response(204);
    }
}
