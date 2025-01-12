<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $adi = $_POST['adi'];
    $soyadi = $_POST['soyadi'];
    $telefon = $_POST['telefon'];
    $mail = $_POST['mail'];
    $adres = $_POST['adres'];

    $sql = "INSERT INTO Musteri (adi, soyadi, telefon, mail, adres) 
            VALUES ('$adi', '$soyadi', '$telefon', '$mail', '$adres')";

    if ($conn->exec($sql)) {
        echo "Müşteri başarıyla eklendi!";
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
    <title>Müşteri Ekle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Müşteri Ekle</h1>
        <form action="" method="post">
            <label for="adi">Adı:</label>
            <input type="text" id="adi" name="adi" required><br>

            <label for="soyadi">Soyadı:</label>
            <input type="text" id="soyadi" name="soyadi" required><br>

            <label for="telefon">Telefon:</label>
            <input type="text" id="telefon" name="telefon" required><br>

            <label for="mail">E-posta:</label>
            <input type="email" id="mail" name="mail"><br>

            <label for="adres">Adres:</label>
            <textarea id="adres" name="adres"></textarea><br>

            <button type="submit">Müşteri Ekle</button>
        </form>
    </div>
</body>
</html>
