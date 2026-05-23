<?php
class AuthController extends Controller {
    private function url($path){
        $config = require __DIR__ . '/../../config/config.php';
        $base = rtrim($config['base_path'] ?? '', '/');
        return $base . $path;
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!verify_csrf()) die('CSRF inválido');
            if(Auth::attempt($_POST['email'] ?? '', $_POST['password'] ?? '')) redirect($this->url('/dashboard'));
            $error='Credenciais inválidas';
        }
        require __DIR__ . '/../Views/auth/login.php';
    }
    public function logout(){ Auth::logout(); redirect($this->url('/login')); }
}
