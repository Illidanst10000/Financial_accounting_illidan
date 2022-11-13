<?php

namespace App\Http\Controllers\Admin\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;

class DeleteController extends BaseController
{
    public function __invoke(Spending $spending)
    {
        $spending->delete();
        return redirect()->route('admin.spendings.index');
    }
}
