<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


use function PHPUnit\Framework\isNull;

class LoginController extends Controller
{
    function __invoke(LoginRequest $request)
    {


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = User::where("email", $request["email"])->first();
            //create Token
            $token = $user->createToken("Api");
            return response(
                [
                    "user"=>$user,
                    "token"=>$token->plainTextToken
                ],
                200,
            );
        }
        return response(
            "User Not Found",
            404,
        );
    }
}
