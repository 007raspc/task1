<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\IndexRequest;
use App\Services\Project\ProjectService;
use Illuminate\Http\JsonResponse;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request, ProjectService $service): JsonResponse
    {
        $data = $request->validated();
        $response = $service->index($data);
        return $this->apiResponse->sendResponse(
            $response,
            'Project list loaded',
        );
    }
}
