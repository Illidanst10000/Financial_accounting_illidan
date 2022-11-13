<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Types\UpdateRequest;
use App\Models\Source;
use App\Models\Type;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Type $type)
    {
        $data = $request->validated();
        $type->update($data);

        return redirect()->route('admin.types.show', compact('type'));
    }
}
