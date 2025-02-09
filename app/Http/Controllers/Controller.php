<?php

namespace App\Http\Controllers;

use App\Action\Helper\ApiResponseAction;

abstract class Controller
{
    protected ApiResponseAction $apiResponse;

    public function __construct(ApiResponseAction $apiResponse)
    {
        $this->apiResponse = $apiResponse;
    }
}
