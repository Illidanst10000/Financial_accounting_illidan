<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Spendings\UpdateRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Spending $spending)
    {

        $data = $request->validated();

        try {
            DB::beginTransaction();

            $userId = auth()->user()->id;

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $spending->update($data);

            if (isset($tagIds)) {
                $spending->tags()->sync($tagIds);
            }

            DB::table('user_balances')
                ->where('type_id', '=', $spending['type_id'])
                ->where('user_id', '=', $userId)
                ->increment('balance', $data['amount'] - $spending['amount']);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return response($spending);
    }
}
