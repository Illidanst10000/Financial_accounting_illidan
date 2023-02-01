<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sources\StoreRequest;
use App\Models\Source;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Source::firstOrCreate($data);

        return redirect()->route('admin.sources.index');
    }
}
