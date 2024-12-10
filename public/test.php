<?php
$fontPath = __DIR__ . '/fonts/IRANSansXV.woff2';
if (!file_exists($fontPath)) {
    die("Font file not found: $fontPath");
}

$fontData = file_get_contents($fontPath);
$base64 = base64_encode($fontData);

header('Content-Type: text/plain');
echo "data:font/woff2;base64," . $base64;
