<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tags\UpdateRequest;
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

        return redirect()->route('admin.tags.show', compact('tag'));
    }
}
