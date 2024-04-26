<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the authenticated user has admin role
        if ($request->user() !== null && $request->user()->role === 'admin') {
            return $next($request);
        }

        // If user is not admin, return unauthorized response
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
