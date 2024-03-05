<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class OrganisateurMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->cookie('jwt_token');

        if (!$token) {
            return response()->json(['message' => 'Missing token'], 401);
        }

        try {
            $decodedToken =JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }
        $user = User::find($decodedToken->id);
        // dd($user);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 401);
        }

        if ($user->id_role != 2) {
            return response()->json(['message' => 'You are not an organisateur'], 401);
        }

        $isOrganisater=$user->id_role == 2;
        $isAdmin=$user->id_role == 1;
        // dd($isAdmin);
        \View::share('isOrganisater', $isOrganisater);
        \View::share('isAdmin', $isAdmin);
        return $next($request);
    }
}
