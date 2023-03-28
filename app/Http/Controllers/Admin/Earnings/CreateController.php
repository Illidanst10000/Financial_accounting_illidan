<?php

namespace App\Http\Controllers\Admin\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Source;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;

        $types = Type::join('user_types', 'types.id', '=', 'user_types.type_id')
            ->where('user_id', '=', $userId)->get();

        $sources = Source::join('user_sources', 'sources.id', '=', 'user_sources.source_id')
            ->where('user_id', '=', $userId)->get();


        return view('admin.earnings.create', compact('types', 'sources'));
    }
}
