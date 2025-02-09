<?php

namespace App\Services\Setting;

use App\Action\Helper\CsvReaderAction;
use App\Models\ProjectModel;
use App\Services\Project\ProjectService;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingService
{
    public function index(): array
    {
        $files = Storage::disk('public')->files('uploads');
        $filtered = array_filter($files, function($file) {
            return strtolower(pathinfo($file, PATHINFO_EXTENSION)) === 'csv';
        });
        return [
            'default_data' => [
                'files' => $filtered,
            ],
        ];
    }

    public function upload(string $url): array
    {
        $action = new CsvReaderAction();
        $array = $action->getCsvData($url);

        $service = new ProjectService();
        return $service->update($array);
    }
}
