<?php

namespace App\Http\Controllers\User\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Tags\UpdateRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);

        return redirect()->route('user.tags.show', compact('tag'));
    }
}
