<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class HelloWorldController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $name = $request->input('name');
        Log::info('access user is {name}.', ['name' => $name]);

        $logDailyDays = env('LOG_DAILY_DAYS');
        $message = is_null($logDailyDays) ? 'LOG_DAILY_DAYS value is not set in .env file' : 'LOG_DAILY_DAYS value: '.$logDailyDays;
        Log::info($message);
        Log::channel('json')->info($message);

        if (!$name) {
            Log::channel('slack')->warning('test log message');

            return response()->json(['error' => 'Name parameter is missing'], Response::HTTP_BAD_REQUEST);
        }

        return response()->json(['message' => "Hello, $name"]);
    }
}
