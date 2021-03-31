<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponseTrait
{
    public function error($errorType, $errorStatus): JsonResponse
    {
        return response()->json(['err_msg' => $errorType], $errorStatus);
    }

    public function success($data, $status): JsonResponse
    {
        return response()->json([$data], $status);
    }
}
