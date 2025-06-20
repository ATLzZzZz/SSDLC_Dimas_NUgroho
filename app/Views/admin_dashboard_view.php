<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Selamat Datang di Admin Dashboard!</h1>
    <p>Halaman ini biasanya hanya untuk admin, tetapi sekarang dapat diakses secara publik.</p>
    <?php if (session()->get('isLoggedIn')): ?>
        <p>Anda login sebagai: <?= session()->get('username') ?> (<?= session()->get('role') ?>)</p>
        <p><a href="<?= base_url('logout') ?>">Logout</a></p>
    <?php else: ?>
        <p><a href="<?= base_url('login') ?>">Login</a></p>
    <?php endif; ?>
    <p><a href="<?= base_url('dashboard') ?>">Kembali ke Dashboard Umum</a></p>
</body>

</html>