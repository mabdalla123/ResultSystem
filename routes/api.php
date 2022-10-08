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

    Route::get('department/{department}', App\Http\Controllers\Api\v1\Student\Show::class);

    Route::put('department/{department}/edit', App\Http\Controllers\Api\v1\Department\edit::class);

    Route::delete('department/{department}/delete', App\Http\Controllers\Api\v1\Department\delete::class);

    /**
     * End Of department Controller
     */

    /**
     * Student Controller
     */
    Route::get('student', App\Http\Controllers\Api\v1\Student\Index::class);

    Route::get('student/{student}', App\Http\Controllers\Api\v1\Student\Show::class);

    Route::post('student/create', App\Http\Controllers\Api\v1\Student\Create::class);

    Route::put('student/{student}/edit', App\Http\Controllers\Api\v1\Student\Edit::class);

    Route::delete('student/{student}/delete', App\Http\Controllers\Api\v1\Student\Delete::class);

    /**
     * End Student Controller
     */

    /**
     * AcadimicYear Controller
     */
    Route::get('acadimicyear', App\Http\Controllers\Api\v1\AcadimicYear\Index::class);

    Route::get('acadimicyear/{acadimicYear}', App\Http\Controllers\Api\v1\AcadimicYear\Show::class);

    Route::post('acadimicyear/create', App\Http\Controllers\Api\v1\AcadimicYear\Create::class);

    Route::put('acadimicyear/{acadimicYear}/edit', App\Http\Controllers\Api\v1\AcadimicYear\Edit::class);

    Route::delete('acadimicyear/{acadimicYear}/delete', App\Http\Controllers\Api\v1\AcadimicYear\Delete::class);

    /**
     * End AcadimicYear Controller
     */

    /**
     * Semester Controller
     */
    Route::get('semester', App\Http\Controllers\Api\v1\Semester\Index::class);

    Route::get('semester/{semester}', App\Http\Controllers\Api\v1\Semester\Show::class);

    Route::post('semester/create', App\Http\Controllers\Api\v1\Semester\Create::class);

    Route::put('semester/{semester}/edit', App\Http\Controllers\Api\v1\Semester\Edit::class);

    Route::delete('semester/{semester}/delete', App\Http\Controllers\Api\v1\Semester\Delete::class);

    /**
     * End Semester Controller
     */

     /**
     * Semester Controller
     */
    Route::get('subject', App\Http\Controllers\Api\v1\Subject\Index::class);

    Route::get('subject/{subject}', App\Http\Controllers\Api\v1\Subject\Show::class);

    Route::post('subject/create', App\Http\Controllers\Api\v1\Subject\Create::class);

    Route::put('subject/{subject}/edit', App\Http\Controllers\Api\v1\Subject\Edit::class);

    Route::delete('subject/{subject}/delete', App\Http\Controllers\Api\v1\Subject\Delete::class);

    /**
     * End Semester Controller
     */


});
// });
