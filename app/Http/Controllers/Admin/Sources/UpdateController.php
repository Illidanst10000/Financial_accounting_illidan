<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sources\UpdateRequest;
use App\Models\Source;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Source $source)
    {
        $data = $request->validated();
        $source->update($data);

        return redirect()->route('admin.sources.show', compact('source'));
    }
}
