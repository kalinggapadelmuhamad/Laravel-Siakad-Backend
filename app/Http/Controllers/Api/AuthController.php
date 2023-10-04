<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login for user.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $token = $user->createToken('api-token')->plainTextToken;
                return response()->json(
                    [
                        'jwt-token' => $token,
                        'user' => new UserResource($user)
                    ]
                );
            }else{
                throw ValidationException::withMessages([
                    'password' => ['password incorect']
                ]);
            }
        }else{
            throw ValidationException::withMessages([
                'email' => ['email incorect']
            ]);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(
            [
                'message' => 'Logout successfully'
            ]
        );
    }
}
