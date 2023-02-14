<?php

namespace App\Http\Controllers\API\Reports;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Earning;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use App\Models\UserBalance;
use App\Models\UserEarning;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Tag(
 *     name="Reports",
 * )
 */

class ReportController extends Controller
{
    // TODO Need add laravel/requests
    public function getEarningsByDate($fromDate, $toDate)
    {

        $userId = auth()->user()->id;

        $earnings = DB::table('earnings')
            ->join('user_earnings', 'earnings.id', '=', 'user_earnings.earning_id')
            ->where('user_id', '=', $userId)
            ->whereBetween('date', [$fromDate, $toDate])
            ->get();

        return response($earnings, 200);
    }

    public function getEarningsBySource($sourceId)
    {

        $userId = auth()->user()->id;

        $earnings = DB::table('earnings')
            ->join('user_earnings', 'earnings.id', '=', 'user_earnings.earning_id')
            ->where('user_id', '=', $userId)
            ->where('source_id', '=', $sourceId)
            ->get();

        return response($earnings, 200);
    }

    public function getEarningsByType($typeId)
    {

        $userId = auth()->user()->id;

        $earnings = DB::table('earnings')
            ->join('user_earnings', 'earnings.id', '=', 'user_earnings.earning_id')
            ->where('user_id', '=', $userId)
            ->where('type_id', '=', $typeId)
            ->get();

        return response($earnings, 200);
    }

    public function getEarningsByTypeAndSource($typeId, $sourceId)
    {

        $userId = auth()->user()->id;

        $earnings = DB::table('earnings')
            ->join('user_earnings', 'earnings.id', '=', 'user_earnings.earning_id')
            ->where('user_id', '=', $userId)
            ->where('type_id', '=', $typeId)
            ->where('source_id', '=', $sourceId)
            ->get();

        return response($earnings, 200);
    }

    public function getSpendingsByDate($fromDate, $toDate)
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->whereBetween('date', [$fromDate, $toDate])
            ->get();

        return response($spendings, 200);
    }

    public function getSpendingsByCategory($categoryId)
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->where('category_id', '=', $categoryId)
            ->get();

        return response($spendings, 200);
    }

    public function getSpendingsByType($typeId)
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->where('type_id', '=', $typeId)
            ->get();

        return response($spendings, 200);
    }

    public function getSpendingsByTypeAndCategory($typeId, $categoryId)
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->where('type_id', '=', $typeId)
            ->where('category_id', '=', $categoryId)
            ->get();

        return response($spendings, 200);
    }

    public function getSpendingsByTag($tagId)
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->join('spending_tags', 'spendings.id', '=', 'spending_tags.spending_id')
            ->where('tag_id', '=', $tagId)
            ->get();

        return response($spendings, 200);
    }

    public function getSpendingsByTagAndCategory($tagId, $categoryId)
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->join('spending_tags', 'spendings.id', '=', 'spending_tags.spending_id')
            ->where('tag_id', '=', $tagId)
            ->where('category_id', '=', $categoryId)
            ->get();

        return response($spendings, 200);
    }

    public function getSpendingsByTagAndType($tagId, $typeId)
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->join('spending_tags', 'spendings.id', '=', 'spending_tags.spending_id')
            ->where('tag_id', '=', $tagId)
            ->where('type_id', '=', $typeId)
            ->get();

        return response($spendings, 200);
    }

    public function getSpendingsByTagAndTypeAndCategory($tagId, $typeId, $categoryId)
    {
        $userId = auth()->user()->id;

        $spendings = DB::table('spendings')
            ->join('user_spendings', 'spendings.id', '=', 'user_spendings.spending_id')
            ->where('user_id', '=', $userId)
            ->join('spending_tags', 'spendings.id', '=', 'spending_tags.spending_id')
            ->where('tag_id', '=', $tagId)
            ->where('type_id', '=', $typeId)
            ->where('category_id', '=', $categoryId)
            ->get();

        return response($spendings, 200);
    }

        // TODO Start creating reports. Need upgrade(or create new) for arrays in requests. Need upgrade for dates for each report

}
