<?php
// db_config.php - Database credentials
// Get these from your InfinityFree Control Panel (MySQL Databases section)
define('DB_HOST', 'sql103.infinityfree.com'); 
define('DB_NAME', 'if0_41849845_authvault');  
define('DB_USER', 'if0_41849845');            
define('DB_PASS', 'lMyLXfxOkf5U');    

/**
 * Returns a PDO database connection.
 */
function getDB() {
    $host = DB_HOST;
    $db   = DB_NAME;
    $user = DB_USER;
    $pass = DB_PASS;
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        return new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        // TEMPORARY DEBUG MODE: Reveal the real error
        header('Content-Type: application/json');
        echo json_encode(['error' => 'DB Connection failed: ' . $e->getMessage()]);
        exit;
    }
}
