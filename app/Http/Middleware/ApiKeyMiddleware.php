<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = $request->header('X-API-KEY');
        $validKey = env('API_KEY', 'my-secret-api-key');

        if (!$apiKey || $apiKey !== $validKey) {
            return response()->json([
                'message' => 'Unauthorized. Invalid or missing API Key.'
            ], 401);
        }

        return $next($request);
    }
}
