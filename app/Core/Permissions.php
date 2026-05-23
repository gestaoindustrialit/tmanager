<?php
class Permissions {
    public static function can($module, $action='view'){
        if (!Auth::check()) return false;
        $user = Auth::user();
        if (($user['role_name'] ?? '') === 'Super Admin') return true;
        $db = Database::getInstance();
        $st = $db->prepare('SELECT 1 FROM role_permissions rp JOIN permissions p ON p.id=rp.permission_id WHERE rp.role_id=? AND p.module=? AND p.action=? LIMIT 1');
        $st->execute([$user['role_id'],$module,$action]);
        return (bool)$st->fetchColumn();
    }
}
