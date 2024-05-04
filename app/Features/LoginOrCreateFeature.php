<?php

namespace App\Features;

use App\Http\Requests\Api\LoginRequest;
use App\Jobs\CreateUserByArray;
use App\Jobs\FindOneUserByEmail;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Leugin\KitchenCore\Helper\Response;

class LoginOrCreateFeature
{
    public function __construct(
        private readonly CreateUserByArray $createUserByArray,
        private readonly FindOneUserByEmail $userByEmail,
        private readonly LoginRequest $loginRequest
    ) {
        //
    }

    /**
     * @throws ValidationException
     */
    public function __invoke(): JsonResponse
    {
        $user = $this->userByEmail->__invoke($this->loginRequest->get('email'));
        if(!$user) {
            $user = $this->createUserByArray->__invoke(
                [
                'email'=>$this->loginRequest->get('email'),
                'password'=>bcrypt($this->loginRequest->get('password'))
                ]
            );
            return  response()->json($this->successResponse($user));
        }
        if ($this->loginRequest->authenticate($user)) {
            /**
* @var User $user
*/
            $user = $this->loginRequest->user();
            return response()->json($this->successResponse($user));
        }
        throw ValidationException::withMessages(
            [
            'email' => trans('auth.failed'),
            ]
        );
    }

    /**
     * @param  User $user
     * @return array
     */
    private function successResponse(User $user): array
    {
        $tokenResult = $user->createToken('api');
        return Response::success(
            [
            'id' => $user->id,
            'access_token' => $tokenResult->plainTextToken,
            'token_type' => 'Bearer',
            'expired_at'=>$tokenResult->accessToken->expires_at
            ]
        );
    }
}
