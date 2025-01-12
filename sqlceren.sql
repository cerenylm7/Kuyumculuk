CREATE DATABASE CerenKuyumculuk;
USE CerenKuyumculuk;

-- Müşteri Tablosu
CREATE TABLE Musteri (
    musteri_id INT AUTO_INCREMENT PRIMARY KEY,
    adi VARCHAR(50) NOT NULL,
    soyadi VARCHAR(50) NOT NULL,
    telefon VARCHAR(15) NOT NULL,
    mail VARCHAR(100),
    adres VARCHAR(255)
);

-- Ürün Tablosu
CREATE TABLE Urun (
    urun_id INT AUTO_INCREMENT PRIMARY KEY,
    urun_adi VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    birim_fiyat DECIMAL(10, 2) NOT NULL,
    detay VARCHAR(255),
    stok_miktari INT NOT NULL,
    birimi VARCHAR(20) NOT NULL
);

-- Satış Tablosu
CREATE TABLE Satis (
    satis_id INT AUTO_INCREMENT PRIMARY KEY,
    musteri_id INT NOT NULL,
    urun_id INT NOT NULL,
    satis_tarihi DATE NOT NULL,
    satis_fiyati DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (musteri_id) REFERENCES Musteri(musteri_id),
    FOREIGN KEY (urun_id) REFERENCES Urun(urun_id)
);

-- Ödeme Tablosu
CREATE TABLE Odeme (
    odeme_id INT AUTO_INCREMENT PRIMARY KEY,
    musteri_id INT NOT NULL,
    odeme_tarihi DATE NOT NULL,
    odeme_tutari DECIMAL(10, 2) NOT NULL,
    odeme_turu ENUM('Nakit', 'Kredi Kartı', 'Banka Ödemesi') NOT NULL,
    aciklama VARCHAR(255),
    FOREIGN KEY (musteri_id) REFERENCES Musteri(musteri_id)
);

-- Satış Ekleme Prosedürü
DELIMITER //
CREATE PROCEDURE SatisEkle (
    IN p_musteri_id INT,
    IN p_urun_id INT,
    IN p_satis_tarihi DATE,
    IN p_satis_fiyati DECIMAL(10, 2)
)
BEGIN
    INSERT INTO Satis (musteri_id, urun_id, satis_tarihi, satis_fiyati)
    VALUES (p_musteri_id, p_urun_id, p_satis_tarihi, p_satis_fiyati);
END //
DELIMITER ;

-- Stok Güncelleme Tetikleyicisi
DELIMITER //
CREATE TRIGGER StokGuncelle
AFTER INSERT ON Satis
FOR EACH ROW
BEGIN
    UPDATE Urun
    SET stok_miktari = stok_miktari - 1
    WHERE urun_id = NEW.urun_id;
END //
DELIMITER ;

-- Ödeme Log Tetikleyicisi
DELIMITER //
CREATE TRIGGER OdemeLoglama
AFTER INSERT ON Odeme
FOR EACH ROW
BEGIN
    INSERT INTO OdemeLog (musteri_id, odeme_tarihi, odeme_tutari)
    VALUES (NEW.musteri_id, NEW.odeme_tarihi, NEW.odeme_tutari);
END //
DELIMITER ;

-- Toplam Satış Geliri Fonksiyonu
DELIMITER //
CREATE FUNCTION ToplamSatisGeliri()
RETURNS DECIMAL(10, 2)
DETERMINISTIC
BEGIN
    DECLARE toplam_gelir DECIMAL(10, 2);
    SELECT SUM(satis_fiyati) INTO toplam_gelir FROM Satis;
    RETURN toplam_gelir;
END //
DELIMITER ;