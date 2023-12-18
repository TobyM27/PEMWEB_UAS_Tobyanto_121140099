-- Active: 1702814989817@@127.0.0.1@3308@nakamaDB
CREATE TABLE `nakama`(
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `karakter_favorit` VARCHAR(50) NOT NULL,
    `usia_karakter` INT(3) NOT NULL,
    `devilfruit` VARCHAR(50) NOT NULL,
    `asal_krew` VARCHAR(50) NOT NULL,
    `nilai_bounty` BIGINT(255) NOT NULL
);



-- Berikut merupakan query untuk membuat struktur tabel dari users yang akan menampung data credentials dari pengguna website
CREATE TABLE `pengguna` (
    `username` VARCHAR(50) NOT NULL,
    `password` VARCHAR(50) NOT NULL
)

INSERT INTO `pengguna` (`username`, `password`) VALUES 
('Nakama', 'May5');

-- memasuki beberapa data untuk tabel 'nakama'
INSERT INTO `nakama` (`id`, `karakter_favorit`, `usia_karakter`, `devilfruit`, `asal_krew`, `nilai_bounty`) VALUES 
    (1,'Monkey D Luffy', 20, 'Gomu Gomu No Mi', 'Straw Hat Crew', 3000000000),
    (2,'Monkey D Garp', 40, 'fruitless', 'Marine', 0),
    (3,'Roronoa Zoro', 21, 'fruitless', 'Straw Hat Crew', 320000000),
    (4,'Nami', 22, 'fruitless', 'Straw Hat Crew', 66000000),
    (5,'Boa Hancock', 29, 'Mero Mero no Mi', 'Kuja Pirates', 800000000),
    (6,'Portgas D. Ace', 25, 'Mera Mera no Mi', 'Whitebeard Pirates', 550000000),
    (7,'Franky', 34, 'fruitless', 'Straw Hat Crew', 94000000);