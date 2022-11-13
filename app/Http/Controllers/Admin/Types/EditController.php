<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Models\Type;

class EditController extends Controller
{
    public function __invoke(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }
}
