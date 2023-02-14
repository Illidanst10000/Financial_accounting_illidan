<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Users\LoginRequest;
use App\Models\Category;
use App\Models\Source;
use App\Models\Tag;
use App\Models\Type;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $data = $request->validated();

        if ((!auth()->attempt($data))) {
            return response()->json([
                'message' => 'The given data was invalid',

            ], 422);
        }

        $user = User::where('email', '=', $data['email']);
        $authToken = $user->createToken('auth-token')->plainToText();

        return response()->json([
            'access_token' => $authToken,
        ]);
    }
}
