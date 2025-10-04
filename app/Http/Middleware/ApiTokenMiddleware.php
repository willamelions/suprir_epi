<?php

namespace App\Http\Middleware;

use App\Models\ApiToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class ApiTokenMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization');
        if (!$header || !str_starts_with($header, 'Bearer ')) {
            return response()->json(['message' => 'Token ausente'], 401);
        }

        $plain = substr($header, 7);
        $hash = hash('sha256', $plain);

        $token = ApiToken::with('user')->where('token', $hash)->first();
        if (!$token) {
            return response()->json(['message' => 'Token inválido'], 401);
        }

        $token->forceFill(['last_used_at' => now()])->save();

        // Attach to request
        $request->attributes->set('auth_user', $token->user);
        $request->attributes->set('auth_token_hash', $hash);

        return $next($request);
    }
}
