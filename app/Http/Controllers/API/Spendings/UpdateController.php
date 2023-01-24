<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Spendings\UpdateRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Spending $spending)
    {
            $data = $request->validated();
        dd($data);
        $spending = $this->service->update($data, $spending);

        return response('lol');
    }
}
