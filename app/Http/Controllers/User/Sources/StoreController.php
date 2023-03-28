<?php

namespace App\Http\Controllers\User\Sources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sources\StoreRequest;
use App\Models\Source;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $source = Source::firstOrCreate($data);
            $userId = auth()->user()->id;
            $source->userSources()->attach($userId);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return redirect()->route('user.sources.index');
    }
}
