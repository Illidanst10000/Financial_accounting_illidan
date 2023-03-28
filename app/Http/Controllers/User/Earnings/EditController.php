<?php

namespace App\Http\Controllers\User\Earnings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    public function __invoke(Earning $earning)
    {
        $userId = auth()->user()->id;

        $types = Type::join('user_types', 'types.id', '=', 'user_types.type_id')
            ->where('user_id', '=', $userId)->get();

        $sources = Source::join('user_sources', 'sources.id', '=', 'user_sources.source_id')
            ->where('user_id', '=', $userId)->get();

        return view('user.earnings.edit', compact('earning', 'types', 'sources'));
    }
}
