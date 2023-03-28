<?php

namespace App\Http\Controllers\User\Spendings;

use App\Models\Spending;
use Illuminate\Support\Facades\DB;

class DeleteController extends BaseController
{
    public function __invoke(Spending $spending)
    {
        try {
            DB::beginTransaction();

            $spending->delete();

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return redirect()->route('user.spendings.index');
    }
}
