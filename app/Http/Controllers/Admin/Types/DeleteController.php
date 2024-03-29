<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class DeleteController extends Controller
{
    public function __invoke(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.type.index');
    }
}
