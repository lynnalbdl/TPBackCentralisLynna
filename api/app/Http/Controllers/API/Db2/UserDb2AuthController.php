<?php

namespace App\Http\Controllers\API\Db2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\ModelsDb2\UserDb2;
use App\Hashing\Sha256Hasher;
use Laravel\Sanctum\HasApiTokens;


class UserDb2AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
    
        $data = $validator->validated();
    
        $user = UserDb2::where('email', $data['email'])->first();
    
        if (! $user || ! app(Sha256Hasher::class)->check($data['password'], $user->password)) {
            return response()->json(['error' => 'Email ou mot de passe incorrect'], 401);
        }
    
        // Révoque les anciens tokens s'il y en a
        $user->tokens()->delete();
    
        $token = $user->createToken('auth_token')->plainTextToken;
    
        return response()->json([
            'message' => 'Connexion réussie',
            'token' => $token,
        ]);
    }
}
