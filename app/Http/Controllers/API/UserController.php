<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function index()
    {
        try {
            $users = User::all();
            $userResource = UserResource::collection($users);
            return $this->sendResponse($userResource,"User List Successfully");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function show($id)
    {
        try {
            $users = User::findOrFail($id);
            $userResource = new UserResource($users);
            return $this->sendResponse($userResource,"User Successfully");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    
}
