<?php

namespace App\Features;


use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class LogoutFeature
{

    /**
     * @throws ValidationException
     */
    public function __invoke(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return response()->json(
            [
            'success' => true,
            'message' => 'Successfully logged out'
            ]
        );
    }


}
