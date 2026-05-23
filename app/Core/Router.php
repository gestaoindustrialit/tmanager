<?php
class Router {
    private $routes=[];
    public function get($path,$handler){$this->routes['GET'][$path]=$handler;}
    public function post($path,$handler){$this->routes['POST'][$path]=$handler;}
    public function dispatch($path,$method){
        $handler = $this->routes[$method][$path] ?? null;
        if(!$handler){ http_response_code(404); echo '404 - Rota não encontrada'; return; }
        [$class,$action] = $handler;
        if (!class_exists($class) || !method_exists($class, $action)) {
            http_response_code(500);
            echo '500 - Handler inválido';
            return;
        }
        (new $class)->$action();
    }
}
