<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LoginController
{
    /**
     * @throws ValidationException
     */
    public function __invoke(LoginRequest $request): JsonResponse
    {

        $request->authenticate();
        $user = auth()->user();

        if($user->user_type === "admin"){
            $token = auth()->user()->createToken("personal-token",["admin-dashboard","manage-questions","manage-quiz"])->plainTextToken;
        }else{
            $token = auth()->user()->createToken("personal-token",['student-dashboard','take-quiz','update-profile'])->plainTextToken;
        }

        return response()->json([
            'message' => "Successfully logged in",
            'token' => $token
        ]);
    }
}
