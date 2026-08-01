<?php

$storagePath = storage_path('framework/views');
$compiledPath = env('VIEW_COMPILED_PATH', $storagePath);

if (!is_writable($storagePath) && is_writable('/tmp')) {
    $compiledPath = '/tmp/framework/views';
}

return [

    'paths' => [
        resource_path('views'),
    ],

    'compiled' => $compiledPath,

];
