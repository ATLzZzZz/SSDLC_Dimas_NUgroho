<!DOCTYPE html>
<html>
<head>
    <title>Hubungi Kami</title>
</head>
<body>
    <h1>Hubungi Kami</h1>
    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>
    <?php if (isset($validation)): ?>
        <div style="color: red;">
            <?= $validation->listErrors() ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('contacts/submit') ?>" method="post">
        <label for="name">Nama:</label><br>
        <input type="text" id="name" name="name" value="<?= old('name') ?>"><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?= old('email') ?>"><br><br>
        <label for="message">Pesan:</label><br>
        <textarea id="message" name="message"><?= old('message') ?></textarea><br><br>
        <input type="submit" value="Kirim Pesan">
    </form>
    <p><a href="<?= base_url('contacts') ?>">Lihat Daftar Kontak</a></p>
</body>
</html>