<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Helper\FileRequest;
use App\Http\Requests\Setting\UploadSettingRequest;
use App\Services\Setting\SettingService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __invoke(Request $request, SettingService $service): JsonResponse
    {
        $response = $service->index();
        return $this->apiResponse->sendResponse(
            $response,
            'File successfully uploaded',
        );
    }

    public function upload(UploadSettingRequest $request, SettingService $service): JsonResponse
    {
        $data = $request->validated();
        $response = $service->upload($data['url']);
        return $this->apiResponse->sendResponse(
            $response,
            'File successfully uploaded',
        );
    }
}
