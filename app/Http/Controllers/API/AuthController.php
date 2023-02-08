<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//custom
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->user = User::query();
        $this->profile = Profile::query();
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|max:12',
        ]);
        if ($validator->fails()) {
            $response = [
                'errors' => $validator->errors()->all(),
                'data' => (object)[],
            ];
            return response($response, 422);
        }
        $user = $this->user->where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = [
                    'message' => 'You have been login successfully.',
                    'data' => [
                        'token' => $token,
                        'user' => $user,
                        'profile' => $user->profile,
                    ]
                ];
                return response($response, 200);
            } else {
                $response = [
                    'message' => 'Password mismatch.',
                    'data' => (object)[],
                ];
                return response($response, 422);
            }
        } else {
            $response = [
                'message' => 'User does not exist.',
                'data' => (object)[],
            ];
            return response($response, 422);
        }
    }

    public function logout (Request $request) {
        
        if($request->bearerToken()==null){
            $response = [
                'message' => 'bearerToken not set',
                'data' => (object)[],
            ];
            return response($response, 422);
        }
        $token = $request->user('api')->token();
        $token->revoke();
        $response = [
            'message' => 'You have been successfully logged out!',
            'data' => (object)[]
        ];
        return response($response, 200);
    }

    public function register (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'first_name' => 'required|string|max:255',
            'private_mode' => 'required|boolean',
        ]);
        if ($validator->fails())
        {
            return response(['errors'=>$validator->errors()->all()], 422);
        }
        $request['password']=Hash::make($request['password']);
        //$request['remember_token'] = Str::random(10);
        //$user = $this->user->create($request->toArray());
        $user = $this->user->create($request->only(['name','email', 'password']));
        $token = $user->createToken('Laravel Password Grant Client')->accessToken;
        //profile model 
        $request['user_id']=$user->id;
        $this->profile->create($request->only(['user_id','first_name','last_name','middle_name','gender','birthplace','status','private_mode']));
        $response = [
            'message' => 'You have been Register successfully.',
            'data' => [
                'token' => $token,
                'user' => $user,
                'profile' => $user->profile,
            ]
        ];
        return response($response, 200);
    }

    public function profile() 
    { 
        $user = Auth::user();
        dd($user);
        if($user){
            $response = [
                'message' => 'You have been User details successfully.',
                'data' => [
                    'user' => $user,
                    'profile' => $user->profile,
                ]
            ];
            return response($response, 200);
        }
        $response = [
            'message' => 'These credentials do not match our records.',
            'data' => (object)[],
        ];
        return response($response, 422);
        
    }
}
