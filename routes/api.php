<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\Helper',
    'prefix' => 'helpers',
], function () {
    Route::post('upload_file', 'UploadFileController');
});

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\Setting',
    'prefix' => 'settings',
], function () {
    Route::get('', 'SettingController');
    Route::post('upload', 'SettingController@upload');
});

Route::group([
    'middleware' => 'api',
    'namespace' => 'App\Http\Controllers\Project',
    'prefix' => 'projects',
], function () {
    Route::get('', 'IndexController');
});
