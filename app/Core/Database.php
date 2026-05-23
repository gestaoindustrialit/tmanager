<?php
class Database {
    private static $instance;
    public static function getInstance(){
        if (!self::$instance) {
            $config = require __DIR__ . '/../../config/config.php';
            self::$instance = new PDO('sqlite:' . $config['db_path']);
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return self::$instance;
    }
}
