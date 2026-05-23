<?php
function e($value){ return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function csrf_token(){ if(empty($_SESSION['_csrf'])) $_SESSION['_csrf']=bin2hex(random_bytes(32)); return $_SESSION['_csrf']; }
function verify_csrf(){ return isset($_POST['_csrf'], $_SESSION['_csrf']) && hash_equals($_SESSION['_csrf'], $_POST['_csrf']); }
function redirect($path){ header('Location: '.$path); exit; }
