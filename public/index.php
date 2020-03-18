<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$templates = new League\Plates\Engine(__DIR__ . '/../src/template');

$header = 'Hi ho let\'s go!';
echo $templates->render('hi', ['header' => $header]);
