<?php
session_start();
foreach (glob(__DIR__ . '/../app/Core/*.php') as $file) require_once $file;
foreach (glob(__DIR__ . '/../app/Controllers/*.php') as $file) require_once $file;
foreach (glob(__DIR__ . '/../app/Models/*.php') as $file) require_once $file;
require_once __DIR__ . '/../app/Core/Helpers.php';
App::run();
