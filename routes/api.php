<?php


 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugInteractionController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\flutterMedicineController;

Route::get('/medicines', [flutterMedicineController::class, 'index']);
Route::post('/medicines', [flutterMedicineController::class, 'store']);
Route::get('/medicines/{id}', [flutterMedicineController::class, 'show']);
Route::put('/medicines/{id}', [flutterMedicineController::class, 'update']);
Route::delete('/medicines/{id}', [flutterMedicineController::class, 'destroy']);


Route::get('/drug-conflicts', [DrugInteractionController::class, 'index']);
Route::post('/drug-conflicts', [DrugInteractionController::class, 'store']);
Route::get('/drug-conflicts/{id}', [DrugInteractionController::class, 'show']);
Route::put('/drug-conflicts/{id}', [DrugInteractionController::class, 'update']);
Route::delete('/drug-conflicts/{id}', [DrugInteractionController::class, 'destroy']);
// routes/api.php
Route::apiResource('medicines', 'MedicineController');
Route::apiResource('drug-interactions', 'DrugInteractionController');



  $router->get( '/', function(){
  return response()->json('Welcome To laravel api');
  });
  Route::group([
      'prefix' => 'auth'
      ], function (){
        Route::post('/register', [AuthenticationController::class, 'register']);
        Route::post('/login', [AuthenticationController::class, 'login']);


      });
     




  Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
 });

    // use Illuminate\support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use App\Http\Controllers\SensorController;

// use App\Http\Controllers\SensorController;
// use App\Http\Controllers\HeartRateController;
// use App\Http\Controllers\DrugConflictController;
// use App\Http\Controllers\MedicalHistoryController;




// Route::post('login', 'AuthController@login');
// Route::post('logout', 'AuthController@logout');
// Route::post('register', 'AuthController@register');
// Route::get('/drugs', 'DrugController@index');
// Route::get('index', [usercontrollers::class,'index']); 
//   Route::group(['middleware' => ['auth:api']], function() {
//     Route::get('users', 'UsersController@details');  
//   });



// Route::apiResource('medical-histories', MedicalHistoryController::class);


// Route::apiResource('heart-rates', HeartRateController::class);

// Route::apiResource('drug-conflicts', DrugConflictController::class);
// Route::get('/sensor', [SensorController::class, 'index']);
// Route::post('/sensor', [SensorController::class, 'update']);

// use Laravel\Sanctum\Sanctum;

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

