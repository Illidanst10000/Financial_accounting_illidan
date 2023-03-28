<?php

namespace App\Http\Controllers\Admin\Sources;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sources\UpdateRequest;
use App\Models\Source;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Source $source)
    {
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $source->update($data);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return redirect()->route('admin.sources.show', compact('source'));
    }
}
