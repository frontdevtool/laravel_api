<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //

    // public function register(Request $request){
    public function register(RegisterRequest $request)
    {
        // dd($request->validated());
        // return 5555;
        $data = $request->validated();

        $user = User::create($data);

        if ($user->id) {
            $data['token'] = $user->createToken('api-token')->plainTextToken;
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            return ApiResponse::sendResponse(201, 'data has stored', $data);
        }
        return ApiResponse::sendResponse(201, 'somthing Error', []);

        // return $request ;
    }
    public function login(LoginRequest $request)
    {
        // dd($request->validated());

        $data = $request->validated();
        // return Auth::attempt(['email' => $request->email, 'password' => $request->password]) ;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            $data['token'] = $user->createToken('api-token')->plainTextToken;
            $data['email'] = $user->email;
            $data['name'] = $user->name;
            return ApiResponse::sendResponse(200, 'user has login', $data);
            // return $data;
        }else {
            
            return ApiResponse::sendResponse(401, 'please register', []);
        }
        

    }
    public function logout(Request $request)
    {
        // dd($request->validated());
// return 55 ;
        // Auth::logout();

        // return 'ut';

    //  return $request->bearerToken()  ;
      $request->user()->currentAccessToken()->delete() ;
      return ApiResponse::sendResponse(200 , 'logout successfully' , []);
    //  return dd($request->user()) ;
    //  return $request;


    }
}
