<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);  // Allow the request to proceed
        }

        // If the user is not an admin, return an unauthorized response
        return response()->json(['error' => 'You Are Not Authorized'],  401);
        // return redirect('home')->with('error' , 'You Have No Access');
    }
}
