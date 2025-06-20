<!DOCTYPE html>
<html>
<head>
    <title>Detail Pengguna</title>
</head>
<body>
    <h1>Detail Pengguna: <?= $user['username'] ?></h1>
    <p>ID: <?= $user['id'] ?></p>
    <p>Role: <?= $user['role'] ?></p>
    <p>Dibuat Pada: <?= $user['created_at'] ?></p>
    <a href="<?= base_url('users') ?>">Kembali ke Daftar Pengguna</a>
</body>
</html>