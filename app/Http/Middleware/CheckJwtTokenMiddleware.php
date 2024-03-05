<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CheckJwtTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { $token = $request->cookie('jwt_token');

        if (!$token) {
            return response()->json(['message' => 'Missing token'], 401);
        }

        try {
            $decodedToken =JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        $user = User::find($decodedToken->id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 401);
        }

        $request->merge(['decoded_user' => $user]);


        return $next($request);
    }
}
