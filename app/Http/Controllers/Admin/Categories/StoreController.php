<?php

namespace App\Http\Controllers\Admin\Types;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Types\StoreRequest;
use App\Models\Source;
use App\Models\Type;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Type::firstOrCreate($data);

        return redirect()->route('admin.types.index');
    }
}
