<?php
namespace App\Http\Controllers\Api\Auth;


use App\Features\GetMeFeature;
use App\Features\LoginOrCreateFeature;
use App\Features\LogoutFeature;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(LoginOrCreateFeature $feature): JsonResponse
    {
        return  $feature->__invoke();
    }


    public function logout(LogoutFeature $logoutFeature): JsonResponse
    {
        return$logoutFeature->__invoke();
    }
    public function me(GetMeFeature $feature): JsonResponse
    {
        return  $feature->__invoke();
    }

}
