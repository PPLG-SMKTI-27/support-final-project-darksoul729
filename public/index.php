<?php
require_once __DIR__ . '/../app/Controllers/UserController.php';

$controller = new UserController();
$action = $_GET['action'] ?? 'index';

if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Halaman tidak ditemukan!";
}
