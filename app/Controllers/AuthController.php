<?php
class AuthController extends Controller {
    public function login(){
        if($_SERVER['REQUEST_METHOD']==='POST'){
            if(!verify_csrf()) die('CSRF inválido');
            if(Auth::attempt($_POST['email'] ?? '', $_POST['password'] ?? '')) redirect('/dashboard');
            $error='Credenciais inválidas';
        }
        require __DIR__ . '/../Views/auth/login.php';
    }
    public function logout(){ Auth::logout(); redirect('/login'); }
}
