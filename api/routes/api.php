<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use App\Http\Controllers\API\AuthController;

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

// Route de test classique
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->get('/user/me', function () {
    return response()->json(auth()->user());
});


use App\ModelsDb2\UserDb2;

Route::get('/test-UserDb2s', function () {
    try {
        $users = UserDb2::all();
        return response()->json($users);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

use Illuminate\Support\Facades\DB;

Route::get('/test-db2', function () {
    try {
        $result = DB::connection('second_db')->select('SHOW TABLES');
        return response()->json($result);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
