<?php

use App\Http\Controllers\Api\V1\Admin\TourController as AdminTourController;
use App\Http\Controllers\Api\V1\Admin\TravelController as AdminTravelController;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\TourController;
use App\Http\Controllers\Api\V1\TravelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(
    function () {
        Route::get('/travels', [TravelController::class, 'index']);
        Route::get('/travels/{travel:slug}/tours', [TourController::class, 'index']);
        Route::post('/login', LoginController::class);

        //Routes with prefix 'v1/admin'
        Route::prefix('admin')->middleware('auth:sanctum')->group(
            function () {
                //routes access with admin user
                Route::middleware('role:admin')->group(function () {
                    Route::post('/travels', [AdminTravelController::class, 'store']);
                    Route::post('/travels/{travel}/tours', [AdminTourController::class, 'store']);
                });
                //routes access with editor or admin user
                Route::put('/travels/{travel}', [AdminTravelController::class, 'update']);
            }
        );
        //End of Routes with prefix 'v1/admin'
    }
);
