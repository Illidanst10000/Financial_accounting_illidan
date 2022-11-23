<?php

namespace App\Http\Controllers\User\Earnings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Earnings\UpdateRequest;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Earning $earning)
    {
        $data = $request->validated();
        $earning->update($data);

        return redirect()->route('user.earnings.show', compact('earning'));
    }
}
