<?php

namespace App\Http\Controllers\User\Types;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Types\StoreRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $type = Type::firstOrCreate($data);

        $userId = auth()->user()->id;
        $type->userTypes()->attach($userId);

        return redirect()->route('user.types.index');
    }
}
