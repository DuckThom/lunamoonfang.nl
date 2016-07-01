<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

/**
 * Class ApiController.
 */
class ApiController extends Controller
{
    /**
     * Return as a failed request
     * Default: HTTP 400 Bad Request.
     *
     * @param  string $message
     * @param  string $status
     * @param  int $code
     * @return mixed
     * @throws \Exception
     */
    public function returnInFail($message = '', $status = 'Bad request', $code = 400)
    {
        if ($code >= 100 && $code <= 399) {
            throw new \Exception('HTTP Code 100 to 399 should not be handled as failed requests');
        }

        return response()->json([
            'status'    => $status,
            'code'      => $code,
            'message'   => $message,
        ], $code);
    }

    /**
     * Return as a successful request
     * Default: HTTP 200 OK.
     *
     * @param  array $payload
     * @param  string $status
     * @param  int $code
     * @return mixed
     * @throws \Exception
     */
    public function returnInSuccess($payload = [], $status = 'OK', $code = 200)
    {
        if ($code >= 400) {
            throw new \Exception('HTTP Code 400+ should not be handled as a successful request');
        }

        return response()->json([
            'status'    => $status,
            'code'      => $code,
            'payload'   => $payload,
        ], $code);
    }
}
