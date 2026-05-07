<?php
$uri = urldecode(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH));
$target = __DIR__ . $uri;

if ($uri !== "/" && file_exists($target) && !is_dir($target)) {
    return false;
}

if (is_dir($target) && file_exists(rtrim($target, "/") . "/index.php")) {
    require rtrim($target, "/") . "/index.php";
    return true;
}

if ($uri === "/" && file_exists(__DIR__ . "/index.php")) {
    require __DIR__ . "/index.php";
    return true;
}

http_response_code(404);
echo "Not Found";
