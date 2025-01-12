<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $urun_adi = $_POST['urun_adi'];
    $kategori = $_POST['kategori'];
    $birim_fiyat = $_POST['birim_fiyat'];
    $detay = $_POST['detay'];
    $stok_miktari = $_POST['stok_miktari'];
    $birimi = $_POST['birimi'];

    $sql = "INSERT INTO Urun (urun_adi, kategori, birim_fiyat, detay, stok_miktari, birimi)
            VALUES ('$urun_adi', '$kategori', '$birim_fiyat', '$detay', '$stok_miktari', '$birimi')";

    if ($conn->exec($sql)) {
        echo "Ürün başarıyla eklendi!";
    } else {
        echo "Hata oluştu!";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Ekle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Ürün Ekle</h1>
        <form action="" method="post">
            <label for="urun_adi">Ürün Adı:</label>
            <input type="text" id="urun_adi" name="urun_adi" required><br>

            <label for="kategori">Kategori:</label>
            <input type="text" id="kategori" name="kategori" required><br>

            <label for="birim_fiyat">Birim Fiyat:</label>
            <input type="text" id="birim_fiyat" name="birim_fiyat" required><br>

            <label for="detay">Detay:</label>
            <textarea id="detay" name="detay"></textarea><br>

            <label for="stok_miktari">Stok Miktarı:</label>
            <input type="number" id="stok_miktari" name="stok_miktari" required><br>

            <label for="birimi">Birimi:</label>
            <input type="text" id="birimi" name="birimi" required><br>

            <button type="submit">Ürün Ekle</button>
        </form>
    </div>
</body>
</html>
