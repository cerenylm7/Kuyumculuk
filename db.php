<?php
$host = 'localhost';
$dbname = 'CerenKuyumculuk';
$username = 'root';
$password = 'root'; // XAMPP'de genelde şifre boş olur

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Veritabanı bağlantısı başarılı!";
} catch (PDOException $e) {
    echo "Bağlantı hatası: " . $e->getMessage();
}
?>