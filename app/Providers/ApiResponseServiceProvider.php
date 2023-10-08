<?php

namespace App\Providers;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $response =  app(ResponseFactory::class);

        $response->json()->macro('success', function (
            $status, $code, $data = null
        ) use ($response) {
            $responseData = [
                'status' => $status,
                'code' => $code,
                'data' => $data
            ];
            return $response->json($responseData, $status);
        });


        $response->json()->macro('error', function ($status, $code, $errors) use ($response) {

            if (is_string($errors)) {
                return $response->json([
                    'status' => $status,
                    'code' => $code,
                    'errors' => [$errors],
                ], $status);
            }

            $flatten = [];
            array_walk_recursive($errors, function ($error) use (&$flatten) {
                $flatten[] = $error;
            });

            return $response->json([
                'status' => $status,
                'code' => $code,
                'errors' => $flatten,
            ], $status);
        });
    }
}
