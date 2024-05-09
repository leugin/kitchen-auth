<?php

namespace App\Features;


use App\Models\User;
use Illuminate\Http\JsonResponse;
use Leugin\KitchenCore\Helper\Response;

class GetMeFeature
{

    /**
     */
    public function __invoke(): JsonResponse
    {
        /**@var User $user*/
        $user = auth()->user();
        return response()->json( Response::success([
            'id' => $user->id,
        ]));
    }


}
