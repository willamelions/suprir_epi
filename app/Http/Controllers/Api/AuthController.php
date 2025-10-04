<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApiToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $plainToken = Str::random(64);
        ApiToken::create([
            'user_id' => $user->id,
            'name' => 'api',
            'token' => hash('sha256', $plainToken),
            'abilities' => ['*'],
            'last_used_at' => now(),
        ]);

        return response()->json([
            'token' => $plainToken,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role ?? 'cliente',
            ],
        ]);
    }

    public function logout(Request $request)
    {
        /** @var User $user */
        $user = $request->attributes->get('auth_user');
        $tokenHash = $request->attributes->get('auth_token_hash');
        if ($user && $tokenHash) {
            ApiToken::where('user_id', $user->id)->where('token', $tokenHash)->delete();
        }
        return response()->json(['message' => 'OK']);
    }

    public function me(Request $request)
    {
        /** @var User|null $user */
        $user = $request->attributes->get('auth_user');
        if (!$user) {
            return response()->json(['message' => 'Não autenticado'], 401);
        }
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role ?? 'cliente',
        ]);
    }
}
