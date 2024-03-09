<?php

namespace App\Http\Middleware;

use App\Models\Reservation;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class CheckEventPayment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $token = $request->cookie('jwt_token');

        if (!$token) {
            return redirect('/error')->with('error','Missing login');
        }

        try {
            $decodedToken =JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));
        } catch (\Exception $e) {
            return redirect('/error')->with('error','Invalid ');
        }
        $user = User::find($decodedToken->id);
        $userId=$user->id;
        $eventId = $request->route('idEvent');
        $reservation = Reservation::where('id_user', $userId)
                                   ->where('id_event', $eventId)
                                   ->where('is_payed', 1)
                                   ->first();

        if (!$reservation) {
            return redirect('/error');
        }

        return $next($request);
    }
}
