<?php

namespace App\Http\Controllers\Admin\Tags;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use App\Models\UserTag;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();

        $userId = auth()->user()->id;
        $tag->userTags()->delete($userId);

        return redirect()->route('admin.tags.index');
    }
}
