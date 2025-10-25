<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTokenExpires
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {   
        // Get the current access token
        $token = $request->user()->currentAccessToken();

        // No token at all
        if (! $token) {
            return response()->json([
                'message' => 'Token missing or invalid',
                'status'  => 401,
            ], 401);
        }
        
        // Check if token is expired 
        if($token && $token->expires_at && $token->expires_at->isPast()) {
            return response()->json([
                'message' => 'Token has expired',
                'status' => 401
            
            ], 401);
        }
        return $next($request);
    }
}
