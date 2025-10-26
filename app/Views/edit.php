<!DOCTYPE html>
<html>
<head>
    <title>Edit Pengguna</title>
</head>
<body>
    <h2>Edit Data Pengguna</h2>
    <form method="POST" enctype="multipart/form-data" action="">
        Nama: <input type="text" name="name" value="<?= $user['name']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $user['email']; ?>" required><br><br>
        Foto Saat Ini:<br>
        <img src="/public/uploads/<?= $user['photo'] ?>" width="60">
        Ganti Foto: <input type="file" name="photo"><br><br>
        <img id="preview" src="#" alt="Preview Foto" style="display:none;"><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
    <br>
    <a href="index.php">← Kembali</a>
</body>
<script>
    const photoInput = document.querySelector('input[name="photo"]');
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
</html>

