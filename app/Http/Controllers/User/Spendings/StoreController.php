<?php

namespace App\Http\Controllers\User\Spendings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Spendings\StoreRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();
        $this->service->store($data);


        return redirect()->route('user.spendings.index');
    }
}
