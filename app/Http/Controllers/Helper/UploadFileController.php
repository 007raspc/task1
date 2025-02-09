<?php

namespace App\Http\Controllers\Helper;

use App\Http\Controllers\Controller;
use App\Http\Requests\Helper\FileRequest;
use App\Services\Helper\FileService;
use Illuminate\Http\JsonResponse;

class UploadFileController extends Controller
{
    public function __invoke(FileRequest $request, FileService $service): JsonResponse
    {
        $data = $request->validated();
        $url = $service->upload($data['file']);
        return $this->apiResponse->sendResponse(
            ['url' => $url],
            'File successfully uploaded',
        );
    }
}
