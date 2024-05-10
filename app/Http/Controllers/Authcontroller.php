<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $validator = app('validator')->make($request->all(), 
            
        
        [
            
       
             'name' => 'required|string|max:255',
             'password' => 'required|string|min:5',
             'gender'  => 'required|in:male,female',
             'date' => 'required|date',
             'weight'=> 'nullable|numeric',
             'height' => 'nullable|numeric',
        
        ]);
        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()], 403);
        }

        // Create a new user
        $user = User::create([
            
             'name' => $request->name,
             'password' => Hash::make($request->password),
             'gender'  => $request->gender,
             'birthday' => date('Y-m-d', strtotime($request->date)),
             'weight'  => $request->weight,
             'height'  => $request->height
        ]);

        // Return a success response
        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('MyApp')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
       
    }
    public function CreateNewToken($token)
    {
        return response()->json([
            "access_token" => $token,
            "token_type" => "Bearer",
            "expires_in" => Auth::guard('api')->factory()->getTTL() * 60,
            "user" => auth("api")->user()
        ]);
    }
    

    
    

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out'], 200);
    }
}








// class AuthController extends Controller
// {
//     public function register(Request $request)
//     {
//         // Validate the request data
//         $validator = Validator::make($request->all(),[
        
//             'name' => 'required|string|max:255',
//             'password' => 'required|string|min:8',
//             'gender'  => 'required|in:male,female',
//             'date' => 'required|date',
//             'weight'=> 'nullable|numeric',
//             'height' => 'nullable|numeric',
//         ]);

//         // Create a new user
//         $user = User::make([
//             $validator -> validated(),
//             'name' => $request->name,
//             'password' => Hash::make($request->password),
//             'gender'  => $request->gender,
//             'birthday' => date('Y-m-d', strtotime($request->date)),
//             'weight'  => $request->weight,
//             'height'  => $request->height
//             // 'created_at' => now(),
//             // 'updated_at' => now(),
//         ]);
//         if($validator->fails()) {
//             return response()->json(['errors'=>$validator->errors()],403);
//         }
//         else{

//         // Return a success response
//         return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
//     }
// }


//     public function login(Request $request)
//     {
//         $credentials = $request->only('email', 'password');

//         if (Auth::attempt($credentials)) {
//             $user = Auth::user();
//             $token = $user->createToken('MyApp')->accessToken;
//             return response()->json(['token' => $token], 200);
//         } else {
//             return response()->json(['error' => 'Unauthorized'], 401);
//         }
//     }
//     public   function _construct(){
//         $this->middleware('auth:api', ['except' => ['login','register']]);
//     }

//     public function logout(Request $request)
//     {
//         $request->user()->token()->revoke();
//         return response()->json(['message' => 'Successfully logged out'], 200);
//     }
// }









// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// use carbon\Carbon;
// use App\User;

// class Authcontroller extends Controller
// {
//    public function register(Request $request)
//    {
//    $request->validate([
//     'name'=>'required|string',
//     'email'=>'required|string|unique:users',
//     'password'=>'required|min:6'
//   ]);
//   $user=new User(
//     [
//       'name' => $request->name,
//       'email' =>$request->email,
//       'password' => Hash::make($request->password)
//     ]
//     );
//     $user->save();
//     return response()->json(['message'=>"Successfully  created user!"],201);
//     }
//     public function login(Request $request)
//     {
//         $request->validate([
//             'email'=>'required',
//             'password'=>'required|string'
            
//         ]);
//         $credential = $request('email','password' );
//         if(!Auth::attempt($credential)){

//             return  response ()->json(['error'=>'Unauthorized'],401);
//         }
//         $user = $request->user();
//         $tokenResult=$user->createToken('Personal Access Token');
//         $token= $tokenResult->token;
//         $token->expires_at= Carbon::now( )->addWeeks(1);
//         $token->save();
//         return response() ->json([ 'data'=>[
//             'user' =>Auth::user(),
//             'access_token'=>$tokenResult->accessToken ,
//             'token_type'=>'Bearer',
//             'expires_at'=>Carbon:: parse( $tokenResult->token->expires_at)->toDateTimeString()

//         ]]);

// }
// }
    // class LoginController extends Controller
// {
//     public function getLogin(){
//         return view('login.index');}}
// 
// use App\Models\Drug;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;