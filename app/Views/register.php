<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
</head>
<body>
    <h2>Form Registrasi Pengguna</h2>
    <form method="POST" enctype="multipart/form-data" action="index.php?action=register">
        Nama: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Foto Profil: <input type="file" name="photo" required><br><br>
        <button type="submit">Daftar</button>
    </form>
    <br>
    <a href="index.php">← Kembali ke daftar pengguna</a>
</body>
</html>
