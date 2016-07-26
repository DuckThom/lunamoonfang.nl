<?php

namespace App\Http\Middleware;

use Closure;
use App\Key;
use Carbon\Carbon;

class VerifyApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->has('key')) {
            $key = $request->get('key');

            if ($key = Key::find($key)) {
                if (Carbon::now()->diffInSeconds($key->updated_at) > 5) {
                    $key->increment('count');

                    return $next($request);
                } else {
                    $key->touch();

                    return response()->json([
                        'status'    => 'Too many requests',
                        'code'      => 429,
                        'message'   => 'Too many consecutive requests [Rate limit: max 1 request per 5 seconds]',
                    ], 429);
                }
            } else {
                return response()->json([
                    'status'    => 'Unauthorized',
                    'code'      => 401,
                    'message'   => 'This API key is not allowed to access this route',
                ], 401);
            }
        } else {
            return response()->json([
                'status'    => 'Bad request',
                'code'      => 400,
                'message'   => 'The request is missing an API key',
            ], 400);
        }
    }
}
