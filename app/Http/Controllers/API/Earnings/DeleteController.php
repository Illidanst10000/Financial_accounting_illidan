<?php

namespace App\Http\Controllers\User\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;

class DeleteController extends Controller
{
    public function __invoke(Earning $earning)
    {
        $earning->delete();
        return redirect()->route('user.earnings.index');
    }
}
