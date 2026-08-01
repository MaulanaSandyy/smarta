<?php
header('Content-Type: text/plain');

echo "PHP Version: " . PHP_VERSION . "\n";
echo "Extensions: " . implode(', ', get_loaded_extensions()) . "\n";
echo "Has pdo_pgsql: " . (extension_loaded('pdo_pgsql') ? 'YES' : 'NO') . "\n";
echo "Has pgsql: " . (extension_loaded('pgsql') ? 'YES' : 'NO') . "\n";

try {
    $pdo = new PDO('pgsql:host=' . getenv('DB_HOST') . ';port=' . getenv('DB_PORT') . ';dbname=' . getenv('DB_DATABASE'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::PGSQL_ATTR_SSL_MODE => getenv('DB_SSLMODE') ?: 'require',
    ]);
    echo "DB Connection: SUCCESS\n";
    $stmt = $pdo->query("SELECT current_database(), version()");
    $row = $stmt->fetch();
    echo "Database: " . $row[0] . "\n";
    echo "PostgreSQL Version: " . $row[1] . "\n";
} catch (PDOException $e) {
    echo "DB Connection FAILED: " . $e->getMessage() . "\n";
} catch (Throwable $e) {
    echo "Error: " . get_class($e) . " - " . $e->getMessage() . "\n";
}
