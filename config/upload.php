<?php

return [
    'image' => [
        'max_size' => env('MAX_IMAGE_SIZE', 10485760),
        'types' => explode(',', env('ALLOWED_IMAGE_TYPES', 'jpeg,png,jpg,webp')),
    ],

    'file' => [
        'max_size' => env('MAX_FILE_SIZE', 10485760),
        'types' => explode(',', env('ALLOWED_FILE_TYPES', 'pdf,doc,docx,xlsx,xls,ppt,pptx')),
    ],
];
