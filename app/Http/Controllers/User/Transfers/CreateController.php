<?php

namespace App\Http\Controllers\User\Transfers;

use App\Http\Controllers\Controller;
use App\Models\Type;

class CreateController extends Controller
{
    public function __invoke()
    {
       $types = Type::getTypes();
        return view('user.transfers.create', compact('types'));
    }
}
