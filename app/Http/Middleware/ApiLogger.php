<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class ApiLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        $requestInfo = [
            'method' => $request->method(),
            'url' => $request->url(),
            'input' => $request->input(),
        ];

        $response =  $next($request);

        $requestInfo['response_status'] =  $response->getStatusCode();
        $requestInfo['output'] = $response->getContent();

//        Log::channel('api_logger')->info('API Logs', [$requestInfo]);

        return $response;

    }
}
