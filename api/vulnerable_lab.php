<?php
// api/vulnerable_lab.php
// WARNING: This file is DELIBERATELY VULNERABLE to SQL Injection for educational purposes.
require_once '../db.php';

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
$email = $input['email'] ?? '';
$password = $input['password'] ?? '';

$db = getDB();

/**
 * We use the PDO instance but we MANUALLY concatenate the query 
 * and execute it via query() instead of prepare() to allow injection.
 */
$query = "SELECT id, email, full_name as name, role, secret_data as secret FROM users WHERE email = '$email' AND password_hash = '$password'";

try {
    // We use query() which is vulnerable when variables are concatenated
    $result = $db->query($query);
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode([
        'query' => $query,
        'results' => $rows
    ]);
} catch (Exception $e) {
    echo json_encode([
        'query' => $query,
        'error' => $e->getMessage(),
        'results' => []
    ]);
}
