<?php

namespace App\Http\Controllers\Admin\Spendings;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use App\Service\SpendingService;

class BaseController extends Controller
{
    public $service;

    public function __construct(SpendingService $service)
    {
        $this->service = $service;
    }
}
