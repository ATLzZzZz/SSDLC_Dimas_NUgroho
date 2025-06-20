<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna</title>
</head>
<body>
    <h1>Daftar Pengguna</h1>
    <ul>
        <?php foreach ($users as $user): ?>
            <li><?= $user['username'] ?> (Role: <?= $user['role'] ?>)</li>
        <?php endforeach; ?>
    </ul>
</body>
</html>