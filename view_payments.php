<?php
include 'db.php';

$sql = "SELECT * FROM Odeme
        INNER JOIN Musteri ON Odeme.musteri_id = Musteri.musteri_id";
$stmt = $conn->query($sql);
$odemeler = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ödemeleri Görüntüle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Ödemeler</h1>
        <table>
            <thead>
                <tr>
                    <th>Müşteri Adı</th>
                    <th>Ödeme Tarihi</th>
                    <th>Ödeme Tutarı</th>
                    <th>Ödeme Türü</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($odemeler as $odeme): ?>
                    <tr>
                        <td><?php echo $odeme['adi'] . ' ' . $odeme['soyadi']; ?></td>
                        <td><?php echo $odeme['odeme_tarihi']; ?></td>
                        <td><?php echo $odeme['odeme_tutari']; ?> TL</td>
                        <td><?php echo $odeme['odeme_turu']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
