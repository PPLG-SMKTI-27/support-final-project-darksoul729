<?php
require_once __DIR__ . '/app/Controllers/UserController.php';

$controller = new UserController();
$action = $_GET['action'] ?? 'index';
$id = $_GET['id'] ?? null;

switch ($action) {
    case 'register': $controller->register(); break;
    case 'edit': $controller->edit($id); break;
    case 'detail': $controller->detail($id); break;
    case 'delete': $controller->delete($id); break;
    default: $controller->index(); break;
}
?>
