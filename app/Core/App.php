<?php
class App {
    public static function run(){
        $router = new Router();
        require __DIR__ . '/../../routes.php';
        $router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    }
}
