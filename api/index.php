<?php

// Pastikan direktori cache, views, session, dan logs di /tmp tersedia untuk lingkungan serverless Vercel
$storageDirs = [
    '/tmp/views',
    '/tmp/cache',
    '/tmp/sessions',
    '/tmp/logs',
];

foreach ($storageDirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0755, true);
    }
}

// Forward Vercel requests to public/index.php
require __DIR__ . '/../public/index.php';

