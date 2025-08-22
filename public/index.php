<?php
// public/index.php
declare(strict_types=1);
session_start();
require_once __DIR__ . '/../app/config/config.php';
require_once __DIR__ . '/../app/core/helpers.php';
foreach (glob(__DIR__ . '/../app/core/*.php') as $f) if (basename($f)!=='helpers.php') require_once $f;
foreach (glob(__DIR__ . '/../app/models/*.php') as $f) require_once $f;
foreach (glob(__DIR__ . '/../app/controllers/*.php') as $f) require_once $f;

use Core\Router;

$c = $_GET['c'] ?? 'home';
$a = $_GET['a'] ?? 'index';

$router = new Router();
$router->dispatch($c, $a);
