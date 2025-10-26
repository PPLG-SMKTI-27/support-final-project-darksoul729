<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengguna</title>
    <style>
        img.profile {
            width: 120px;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <h2>Detail Pengguna</h2>

    <?php if(!empty($user['photo'])): ?>
        <img class="profile" src="/public/uploads/<?= htmlspecialchars($user['photo']) ?>" alt="Foto <?= htmlspecialchars($user['name']) ?>">
    <?php endif; ?>

    <p><b>Nama:</b> <?= htmlspecialchars($user['name']); ?></p>
    <p><b>Email:</b> <?= htmlspecialchars($user['email']); ?></p>
    <p><b>Dibuat pada:</b> <?= htmlspecialchars($user['created_at']); ?></p>

    <p>
        <a href="index.php">← Kembali ke daftar pengguna</a> |
        <a href="index.php?action=edit&id=<?= $user['id']; ?>">Edit</a>
    </p>
</body>
</html>
