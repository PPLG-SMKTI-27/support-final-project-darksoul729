<?php
require_once __DIR__ . '/../Models/User.php';

class UserController {
    private $model;

    public function __construct() {
        $this->model = new User();
    }

   public function index() {
    $users = $this->model->getAll();
    $content = __DIR__ . '/../Views/index.php';
    include __DIR__ . '/../Views/layout.php';
}


    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $file = $_FILES['photo'];

            $uploadDir = __DIR__ . '/../../public/uploads/';
            $fileName = time() . '_' . basename($file['name']);
            $targetPath = $uploadDir . $fileName;

            $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            if (!in_array($file['type'], $allowedTypes)) {
                die("Format foto tidak valid!");
            }
            
            move_uploaded_file($file['tmp_name'], $targetPath);

            $this->model->register($name, $email, $password, $fileName);
            header("Location: index.php");
        } else {
            include __DIR__ . '/../Views/register.php';
        }
    }

    public function edit($id = null) {
    if (!$id) {
        die("ID user tidak diberikan!");
    }

    $user = $this->model->getById($id);
    if (!$user) {
        die("User tidak ditemukan!");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $photo = $user['photo'];

        if (!empty($_FILES['photo']['name'])) {
            $file = $_FILES['photo'];
            $uploadDir = __DIR__ . '/../../public/uploads/';
            $fileName = time() . '_' . basename($file['name']);
            $targetPath = $uploadDir . $fileName;

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                if (!empty($user['photo']) && file_exists($uploadDir . $user['photo'])) {
                    unlink($uploadDir . $user['photo']);
                }
                $photo = $fileName;
            } else {
                die("Gagal mengunggah foto!");
            }
        }

        $this->model->update($id, $name, $email, $photo);

        header("Location: index.php");
        exit;
    } else {
        $content = __DIR__ . '/../Views/edit.php';
        include __DIR__ . '/../Views/layout.php';
    }
}


   public function delete($id = null) {

    if (!$id) {
        die("ID user tidak diberikan!");
    }

    $user = $this->model->getById($id);

    if ($user) {
        if (!empty($user['photo'])) {
            $photoPath = __DIR__ . '/../../public/uploads/' . $user['photo'];
            if (file_exists($photoPath)) {
                unlink($photoPath);
            }
        }

        $this->model->delete($id);
    }

    header("Location: index.php");
    exit;
}


public function detail($id = null) {
    if (!$id) {
        die("ID user tidak diberikan!");
    }

    $user = $this->model->getById($id);
    if (!$user) {
        die("User tidak ditemukan!");
    }

    $content = __DIR__ . '/../Views/detail.php';
    include __DIR__ . '/../Views/layout.php';
}


}

