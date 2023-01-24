<?php

namespace App\Http\Controllers\User\Tags;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class EditController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('user.tags.edit', compact('tag'));
    }
}
