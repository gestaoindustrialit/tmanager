<?php
class DashboardController extends Controller {
    private function url($path){
        $config = require __DIR__ . '/../../config/config.php';
        $base = rtrim($config['base_path'] ?? '', '/');
        return $base . $path;
    }

    public function index(){ if(!Auth::check()) redirect($this->url('/login')); $this->view('dashboard/index'); }
}
