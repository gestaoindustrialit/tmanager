<?php
class App {
    public static function run(){
        $config = require __DIR__ . '/../../config/config.php';
        $router = new Router();
        require __DIR__ . '/../../routes.php';

        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $basePath = rtrim($config['base_path'] ?? '', '/');

        if ($basePath !== '' && strpos($path, $basePath) === 0) {
            $path = substr($path, strlen($basePath));
            if ($path === '') {
                $path = '/';
            }
        }

        $router->dispatch($path, $_SERVER['REQUEST_METHOD'] ?? 'GET');
    }
}
