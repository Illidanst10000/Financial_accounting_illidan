<?php

namespace App\Http\Controllers\API\Tags;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();

        return response(200);

    }
}
