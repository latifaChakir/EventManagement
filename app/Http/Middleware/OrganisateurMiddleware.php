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
            return redirect('/error')->with('error','Missing login');
        }

        try {
            $decodedToken =JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));
        } catch (\Exception $e) {
            return redirect('/error')->with('error','Invalid token');
        }
        $user = User::find($decodedToken->id);
        // dd($user);

        if (!$user) {
            return redirect('/error')->with('error','User not found');
        }

        if ($user->id_role != 2) {
            return redirect('/error')->with('error','you are not an organizer !!!');
        }
        $userName=$user->name;
        $email=$user->email;

        $isOrganisater=$user->id_role == 2;
        $isAdmin=$user->id_role == 1;
        // dd($isAdmin);
        \View::share('isOrganisater', $isOrganisater);
        \View::share('isAdmin', $isAdmin);
        \View::share('userName', $userName);
        \View::share('email', $email);
        return $next($request);
    }
}
