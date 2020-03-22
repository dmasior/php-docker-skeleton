<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

$templates = new League\Plates\Engine(__DIR__ . '/../src/template');

$number = \random_int(1, 100);
echo $templates->render('hi', ['number' => $number]);
