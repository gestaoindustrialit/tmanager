<?php
class Router {
    private $routes=[];
    public function get($path,$handler){$this->routes['GET'][$path]=$handler;}
    public function post($path,$handler){$this->routes['POST'][$path]=$handler;}
    public function dispatch($uri,$method){
        $path = parse_url($uri, PHP_URL_PATH);
        $handler = $this->routes[$method][$path] ?? null;
        if(!$handler){ http_response_code(404); echo '404'; return; }
        [$class,$action] = $handler; (new $class)->$action();
    }
}
