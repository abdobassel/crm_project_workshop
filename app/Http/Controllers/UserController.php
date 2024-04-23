<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Crm\Base\Requests\CreateUser;
use Crm\Customer\Services\UserServices;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    private UserServices $userServices;
    const TOKEN_NAME = 'personal';
    public function __construct(UserServices $userService)
    {
        $this->userServices = $userService;
    }
    public function createUser(CreateUser $request)
    {
        $user =  $this->userServices->createUser($request);

        if ($user) {
            return response()->json([
                'user' => $user,
                'token' => $user->createToken(name: self::TOKEN_NAME)->plainTextToken, //token as text and  returns in response
            ]);
        }
    }
}
