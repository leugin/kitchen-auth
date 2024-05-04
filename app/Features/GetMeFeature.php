<?php

namespace App\Features;


use App\Models\User;
use Illuminate\Http\JsonResponse;

class GetMeFeature
{

    /**
     */
    public function __invoke(): JsonResponse
    {
        /**@var User $user*/
        $user = auth()->user();
        return response()->json(
            [
            'id' => $user->id,
            ]
        );
    }


}
