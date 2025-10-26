<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h2>Daftar Pengguna</h2>
    <a href="index.php?action=register">+ Tambah Pengguna Baru</a><br><br>

    <?php foreach ($users as $row): ?>
        <div style="border:1px solid #ddd; padding:10px; margin-bottom:10px;">
            <img src="/public/uploads/<?= $row['photo'] ?>" width="60">
            <h3><?= htmlspecialchars($row['name']); ?></h3>
            <p><?= htmlspecialchars($row['email']); ?></p>
            <a href="index.php?action=detail&id=<?= $row['id']; ?>">Lihat Detail</a>
            <a href="index.php?action=edit&id=<?= $row['id']; ?>">Edit</a> | 
            <a href="index.php?action=delete&id=<?= $row['id']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
