<?php

use App\Http\Controllers\Api\v1\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {


    Route::post('/login', LoginController::class);
    /*
    get the User
    */
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    // Route::group(["middleware" => "auth:sanctum"], function () {

        /**
         * Department Controllers
         */

        Route::get('department', App\Http\Controllers\Api\v1\Department\index::class);

        Route::post('department/create', App\Http\Controllers\Api\v1\Department\create::class);

        Route::put('department/{department}', App\Http\Controllers\Api\v1\Department\edit::class);

        Route::delete('department/{department}', App\Http\Controllers\Api\v1\Department\delete::class);

        /**
         * End Of department Controller
         */
    });
// });
