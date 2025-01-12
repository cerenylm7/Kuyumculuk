<?php
include 'db.php';

$sql = "SELECT * FROM Satis
        INNER JOIN Musteri ON Satis.musteri_id = Musteri.musteri_id
        INNER JOIN Urun ON Satis.urun_id = Urun.urun_id";
$stmt = $conn->query($sql);
$satislar = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Satışları Görüntüle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Satışlar</h1>
        <table>
            <thead>
                <tr>
                    <th>Müşteri Adı</th>
                    <th>Ürün Adı</th>
                    <th>Satış Tarihi</th>
                    <th>Satış Fiyatı</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($satislar as $satis): ?>
                    <tr>
                        <td><?php echo $satis['adi'] . ' ' . $satis['soyadi']; ?></td>
                        <td><?php echo $satis['urun_adi']; ?></td>
                        <td><?php echo $satis['satis_tarihi']; ?></td>
                        <td><?php echo $satis['satis_fiyati']; ?> TL</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
