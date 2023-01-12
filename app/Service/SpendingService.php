<?php

namespace App\Service;

use App\Models\Spending;
use Illuminate\Support\Facades\DB;

class SpendingService
{
    public function store($data) {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
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
    }

    public function update($data, $spending) {
        try {
            DB::beginTransaction();

            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }

            $spending->update($data);

            $userId = auth()->user()->id;
            DB::table('user_balances')
                ->where('type_id', '=', $spending['type_id'])
                ->where('user_id', '=', $userId)
                ->increment('balance', $spending['amount'] - $data['amount']);

            if (isset($tagIds)) {
                $spending->tags()->sync($tagIds);
            }
            else {
                $spending->tags()->delete();
            }

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $spending;
    }
}
