<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qr Code</title>
</head>
<body>
    <h1>Qr Code Barang Keluar</h1>
    <!-- Menampilkan gambar QR -->
    <img src="<?= htmlspecialchars($qr_image, ENT_QUOTES, 'UTF-8'); ?>" alt="QR Code">
    <br>
    <a href="<?= site_url('assets/qr/qr-'.$token.'.png'); ?>" download="qrcode-<?= $nama_barang ?>.png">Download QR Code</a>
</body>
</html>
