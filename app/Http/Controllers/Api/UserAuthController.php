<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Validator;

class UserAuthController extends BaseController
{
    public function register(Request $request)
    {
        try{
            // $data = $request->validate([
            //     'name' => 'required|max:255',
            //     'email' => 'required|email|unique:users',
            //     'password' => 'required'
            // ]);

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required'
            ]);
            if($validator->fails()){
                return $this->sendError('Validation Error.', $validator->errors());       
            }
            
            $data['password'] = bcrypt($request->password);
            $data['name'] =  ($request->name);
            $data['email'] =  ($request->email);

            $user = User::create($data);

           $token = $user->createToken('API Token')->accessToken; //passport token
             //$token = $user->createToken('API Token')->plainTextToken; //sanctum token
            $success['token'] =  $token;
            $success['name'] =  $user->name;

            //return response([ 'user' => $user, 'token' => $token]);
            return $this->sendResponse($success, 'User register successfully.');
        }catch(\Exception $ex){
             dd($ex);
        }
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised'], 200);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;
        $success['token'] =  $token;
        $success['user'] =  auth()->user();
        // return response(['user' => auth()->user(), 'token' => $token]);
        return $this->sendResponse($success, 'User register successfully.');

    }

    public function listUsers(Request $request){
        return $this->sendResponse(User::all(), 'User list fetched successfully.');
    }

    public function logout (Request $request) {
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
         
        return $this->sendResponse($response, 'You have been successfully logged out!');
    }
}
