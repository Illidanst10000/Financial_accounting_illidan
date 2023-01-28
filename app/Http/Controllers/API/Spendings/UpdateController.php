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

            if (isset($data['category_id']))
            {
                $category_id = Category::where('title', $data['category_id'])->first()->id;
                $data['category_id'] = $category_id;
            }

            if (isset($data['tag_ids']))
            {
                $tags = $data['tag_ids'];
                unset($data['tag_ids']);

                foreach ($tags as $tag_num => $tag)
                {
                    $tag_id = Tag::where('title', $tag)->first()->id;
                    $tags[$tag_num] = $tag_id;
                }
            }

            if (isset($data['type_id']))
            {
                $types = Type::getTypes();
                $types = array_flip($types);
                $data['type_id'] = $types[$data['type_id']];
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
