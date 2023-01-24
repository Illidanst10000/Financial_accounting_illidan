<?php

namespace App\Http\Controllers\API\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Tags\StoreRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $tag = Tag::firstOrCreate($data);

        $userId = auth()->user()->id;
        $tag->userTags()->attach($userId);

        return response()->json($tag);;
    }
}
