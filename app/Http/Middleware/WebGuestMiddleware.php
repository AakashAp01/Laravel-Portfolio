<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WebGuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {

        if (Auth::check()) {

            $user = User::find(Auth::user()->id);

            if ($user->hasRole('web-user')) {

                return $next($request);

            }else{

                return redirect()->route('admin.dashboard')->with('error', 'Access denied for non-web users.');

            }
        }


        return $next($request);
    }
}
