<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;
use App\Models\Source;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;

        $sources = DB::table('sources')
            ->join('user_sources', 'sources.id', '=', 'user_sources.source_id')
            ->where('user_id', '=', $userId)->get();

        return view('admin.sources.index', compact('sources'));
    }
}
