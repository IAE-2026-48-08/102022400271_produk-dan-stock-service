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
        $apiKey = $request->header('X-IAE-KEY') ?? $request->header('X-API-KEY');
        $validKey = env('API_KEY');
        if (empty($validKey)) {
            $validKey = 'my-secret-api-key';
        }
        $studentNim = '102022400271';

        if (!$apiKey || ($apiKey !== $validKey && $apiKey !== $studentNim)) {
            return response()->json([
                'message' => 'Unauthorized. Invalid or missing API Key.'
            ], 401);
        }

        return $next($request);
    }
}
