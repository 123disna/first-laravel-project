<?php
  return[
    'driver' => env('IMAGE_DRIVER', 'gd'),
    'upload_path' => env('IMAGE_UPLOAD_PATH', '/uploads'),
    'access_path' => env('IMG_PATH', 'http://127.0.0.1:8000/students/create'),

    1 => ['width'=>35, 'height'=>35]
  ];
?>
