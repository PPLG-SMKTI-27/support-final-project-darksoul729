<!DOCTYPE html>
<html>
<head>
    <title>Register User</title>
    <style>
        #preview {
            display: block;
            margin-top: 10px;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <h2>Form Registrasi Pengguna</h2>
    <form method="POST" enctype="multipart/form-data" action="index.php?action=register">
        Nama: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Foto Profil: <input type="file" name="photo" id="photoInput" accept="image/*" required><br>
        <img id="preview" src="#" alt="Preview Foto" style="display:none;"><br><br>
        <button type="submit">Daftar</button>
    </form>
    <br>
    <a href="index.php">← Kembali ke daftar pengguna</a>

    <script>
        const photoInput = document.getElementById('photoInput');
        const preview = document.getElementById('preview');

        photoInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
            }
        });
    </script>
</body>
</html>
