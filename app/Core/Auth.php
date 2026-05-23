<?php
class Auth {
    public static function check(){ return !empty($_SESSION['user']); }
    public static function user(){ return $_SESSION['user'] ?? null; }
    public static function attempt($email, $password){
        $db = Database::getInstance();
        $st = $db->prepare('SELECT u.*, r.name role_name FROM users u LEFT JOIN roles r ON r.id=u.role_id WHERE u.email=? AND u.active=1 LIMIT 1');
        $st->execute([$email]);
        $u = $st->fetch();
        if($u && password_verify($password, $u['password'])){
            $db->prepare('UPDATE users SET last_login = CURRENT_TIMESTAMP WHERE id=?')->execute([$u['id']]);
            $_SESSION['user'] = $u; return true;
        }
        return false;
    }
    public static function logout(){ unset($_SESSION['user']); session_destroy(); }
}
