<?php

namespace App\Action\Helper;

use Illuminate\Support\Facades\Storage;
use League\Csv\Reader;

class CsvReaderAction
{
    public function getCsvData(string $url): array
    {
        $filePath = Storage::disk('public')->path($url);
        $csv = Reader::createFromPath($filePath, 'r');
        $csv->setHeaderOffset(0);
        $records = $csv->getRecords();
        return iterator_to_array($records);
    }
}
