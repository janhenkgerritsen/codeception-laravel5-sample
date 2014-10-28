<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$uri = urldecode($uri);

require_once __DIR__.'/public/index.php';
