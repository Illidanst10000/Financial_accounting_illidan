<?php

namespace App\Http\Controllers\Admin\Spendings;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Spendings\UpdateRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Spending $spending)
    {
            $data = $request->validated();
        $spending = $this->service->update($data, $spending);

        return redirect()->route('admin.spendings.show', compact('spending'));
    }
}
