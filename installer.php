<?php
/**
 * TManager Installer
 * PHP 7.3+ compatible.
 */

error_reporting(E_ALL);
ini_set('display_errors', '1');

$baseDir = __DIR__;
$dbFile = $baseDir . '/database/database.sqlite';
$migrationFile = $baseDir . '/database/migrations.sql';
$seedFile = $baseDir . '/database/seed.sql';
$configFile = $baseDir . '/config/config.php';

function out($message, $type = 'info') {
    $colors = [
        'info' => '#0d6efd',
        'ok' => '#198754',
        'warn' => '#ffc107',
        'err' => '#dc3545',
    ];
    $color = isset($colors[$type]) ? $colors[$type] : $colors['info'];
    echo '<div style="padding:8px 0;color:' . $color . ';font-family:Arial,sans-serif;">' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '</div>';
}

function ensureDir($path) {
    if (!is_dir($path)) {
        return mkdir($path, 0755, true);
    }
    return true;
}

if (PHP_SAPI === 'cli') {
    echo "Abra o installer.php no browser para executar o setup.\n";
    exit(0);
}

echo "<h2 style='font-family:Arial,sans-serif'>TManager Installer</h2>";

if (version_compare(PHP_VERSION, '7.3.0', '<')) {
    out('PHP 7.3+ é obrigatório. Versão atual: ' . PHP_VERSION, 'err');
    exit;
}
out('PHP OK: ' . PHP_VERSION, 'ok');

$requiredExt = ['pdo', 'pdo_sqlite', 'openssl', 'mbstring'];
foreach ($requiredExt as $ext) {
    if (!extension_loaded($ext)) {
        out('Extensão em falta: ' . $ext, 'err');
        exit;
    }
}
out('Extensões obrigatórias OK.', 'ok');

$paths = [
    $baseDir . '/storage/documents',
    $baseDir . '/storage/exports',
    $baseDir . '/storage/logs',
    $baseDir . '/storage/cache',
    $baseDir . '/public/assets/uploads',
    $baseDir . '/public/assets/img',
    $baseDir . '/database',
];

foreach ($paths as $path) {
    if (!ensureDir($path)) {
        out('Falha ao criar diretório: ' . $path, 'err');
        exit;
    }
}
out('Diretórios verificados/criados.', 'ok');

if (!file_exists($dbFile)) {
    if (!touch($dbFile)) {
        out('Não foi possível criar database.sqlite', 'err');
        exit;
    }
}
out('Ficheiro SQLite OK.', 'ok');

try {
    $pdo = new PDO('sqlite:' . $dbFile);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $migrationSql = file_get_contents($migrationFile);
    $pdo->exec($migrationSql);
    out('Migrations executadas.', 'ok');

    $seedSql = file_get_contents($seedFile);
    $pdo->exec($seedSql);
    out('Seed executado.', 'ok');

    $hash = password_hash('admin123', PASSWORD_DEFAULT);
    $st = $pdo->prepare('UPDATE users SET password = :password WHERE email = :email');
    $st->execute([':password' => $hash, ':email' => 'admin@tmanager.local']);
    out('Password do admin inicializada com hash seguro.', 'ok');

    $stmt = $pdo->query("SELECT logo_path FROM company LIMIT 1");
    $company = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($company && empty($company['logo_path'])) {
        $upd = $pdo->prepare("UPDATE company SET logo_path = :logo, updated_at = CURRENT_TIMESTAMP WHERE id = 1");
        $upd->execute([':logo' => '/assets/img/logo-tisser.png']);
    }

    out('Instalação concluída com sucesso.', 'ok');
    echo "<p style='font-family:Arial,sans-serif'>Login: <strong>admin@tmanager.local</strong> / <strong>admin123</strong></p>";
    echo "<p style='font-family:Arial,sans-serif'><a href='/login'>Ir para Login</a></p>";

} catch (Exception $e) {
    out('Erro durante instalação: ' . $e->getMessage(), 'err');
    exit;
}
