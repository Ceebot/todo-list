<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Users\UserRequest;
use App\Http\Resources\UserResource;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(UserRequest $request): JsonResponse
    {
        $data = $request->getData();

        if(!Auth::attempt($data->toArray())) {
            return response()->json([
                'message' => 'authorization error'
            ]);
        }

        $token = Auth::user()->createToken(config('app.name'));
        $token->token->expires_at = Carbon::now()->addDay();
        $token->token->save();

        return response()->json([
            'username' => Auth::user()->name,
            'token' => $token->accessToken,
        ]);
    }

    public function logout(): JsonResponse
    {
        Auth::user()->token()->revoke();

        return response()->json(['message' => 'success logout']);
    }

    public function user(): JsonResponse
    {
        return response()->json(['user' => UserResource::make(Auth::user())]);
    }
}
