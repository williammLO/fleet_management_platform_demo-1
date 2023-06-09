<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Post;
use App\Http\Controllers\TestApi;
use App\Models\Attendance;
use App\Models\J1939_vehicle_realtime_data;
use App\Models\Vehicle_realtime_information_123;
use App\Models\Diver_information_123;
use App\Models\Commercial_vehicle_specification_123;
use App\Http\Controllers\Diver_information_123_Controller;
use App\Http\Controllers\UploadVehicleRealtimeInformationController;
use App\Http\Controllers\AuthController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('photos', Post::class);
Route::resource('make:model Roleest', TestApi::class);
Route::get('/welcome', function(){
    return  J1939_vehicle_realtime_data::all();
   // $real_time = DB::table('j1939_vehicle_realtime_data')->get()->toJson();
   // echo $real_time;
});


Route::middleware('auth:api')->group(function () {
    Route::get('/user', function(Request $request) {
        return $request->user();
    });
});

Route::get('/getVehicleRealtimeStatus', function(){
    return  Vehicle_realtime_information_123::all();
});

Route::get('/getVehicleRealtimeInformation', function(){
    return  Vehicle_realtime_information_123::all();
});

Route::get('/getCommercialVehicleSpecification', function(){
    return  Commercial_vehicle_specification_123::all();
});

Route::resource('/getDiverInformation', Diver_information_123_Controller::class);



Route::resource('test', TestApi::class);
Route::resource('uploadVehicleRealtimeInformation', UploadVehicleRealtimeInformationController::class);

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register',    [AuthController::class, 'register']);       // 使用者註冊
    Route::post('/login',       [AuthController::class, 'login']);          // 使用者登入 (回傳 JWT token 及使用者資訊)
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    // 以 JWT token 取得使用者資訊
    Route::post('/refresh',     [AuthController::class, 'refresh']);        // 更新 JWT token
    Route::post('/logout',      [AuthController::class, 'logout']);         // 使用者登出，移除 JWT token
});








