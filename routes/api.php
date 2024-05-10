<?php


 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\AuthController;

  $router->get( '/', function(){
  return response()->json('Welcome To laravel api');
  });
  Route::group([
      'prefix' => 'auth'
      ], function (){
  Route:: post('/login',[AuthController::class ,'login']) ;
  Route::post('/register',[AuthController::class ,'register']) ;

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

