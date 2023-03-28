<?php

namespace App\Http\Controllers\User\Types;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Types\UpdateRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Type $type)
    {
        $data = $request->validated();
        $type->update($data);

        return redirect()->route('user.types.show', compact('type'));
    }
}
