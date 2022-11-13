<?php

namespace App\Service;

use App\Models\Spending;
use Illuminate\Support\Facades\DB;

class SpendingService
{
    public function store($data) {
        try {
            DB::beginTransaction();

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $spending = Spending::firstOrCreate($data);
            $spending->tags()->attach($tagIds);

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

            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);

            $spending->update($data);
            $spending->tags()->sync($tagIds);

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

        return $spending;
    }
}
