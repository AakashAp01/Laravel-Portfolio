<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WebAuthMiddleware
{
    /**
     * Handle an incoming request for web-user authentication.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('web.index');
        }

        $user = User::find(Auth::user()->id);

        if ($user->hasRole('web-user')) {
            return $next($request);
        }

        return redirect()->route('admin.login')->with('error', 'Access denied for non-web users.');
    }
}
