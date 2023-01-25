<?php

namespace App\Http\Controllers\API\Spendings;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Spendings\StoreRequest;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Spending;
use App\Models\Tag;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        try {
            DB::beginTransaction();

            $category_id = Category::where('title', $data['category_id'])->first()->id;
            $data['category_id'] = $category_id;

            // Todo why I made that? people do not gonna fill inputs by hands, have to change like normal functional
            $types = Type::getTypes();
            $types = array_flip($types);
            $data['type_id'] = $types[$data['type_id']];

            // Todo have to change explode tags to get array in request. dont use body-form data anymore, only json
            if (isset($data['tag_ids'])) {

                $tags = explode(',', $data['tag_ids']);
                unset($data['tag_ids']);
                $tagIds = [];

                foreach ($tags as $tag)
                {
                    $tag_id = Tag::where('title', $tag)->first()->id;
                    $tagIds[$tag] = $tag_id;
                }
            }

            $spending = Spending::firstOrCreate($data);

            if (isset($tagIds)) {
                $spending->tags()->attach($tagIds);
            }

            $userId = auth()->user()->id;
            $spending->userSpendings()->attach($userId);

            DB::table('user_balances')
                ->where('type_id', '=', $spending['type_id'])
                ->where('user_id', '=', $userId)
                ->decrement('balance', $spending['amount']);

            DB::commit();

        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        // TODO have to make exception and respones in all api controller
        return response($spending);
    }
}
