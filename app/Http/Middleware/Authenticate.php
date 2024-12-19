<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Authenticate
{
    /**
     * Handle an incoming request for admin authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.loginPage');
        }

        $user = User::find(Auth::user()->id);

        if ($user->hasRole('admin')) {

            return $next($request);
        }

        return redirect()->route('web.index')->with('error', 'Access denied for non-admin users.');
    }
}
