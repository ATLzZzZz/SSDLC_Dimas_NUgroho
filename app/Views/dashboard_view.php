<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Selamat Datang di Dashboard!</h1>
    <p>Ini adalah halaman yang bisa diakses oleh siapa saja setelah Anda menghapus filter.</p>
    <?php if (session()->get('isLoggedIn')): ?>
        <p>Anda login sebagai: <?= session()->get('username') ?> (<?= session()->get('role') ?>)</p>
        <p><a href="<?= base_url('logout') ?>">Logout</a></p>
    <?php else: ?>
        <p><a href="<?= base_url('login') ?>">Login</a></p>
    <?php endif; ?>
    <p><a href="<?= base_url('users') ?>">Lihat Daftar Pengguna</a></p>
    <p><a href="<?= base_url('contacts') ?>">Lihat Daftar Kontak</a></p>
</body>
</html>