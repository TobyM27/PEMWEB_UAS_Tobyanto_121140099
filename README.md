# Ujian Akhir Semester Pemrograman Web (UAS PemWeb)

## Nama     : Tobyanto Putra Mandiri
## NIM      : 121140099
## Kelas    : Pemrogramman Web RB 

Repository ini digunakan untuk pengumpulan UAS pemrograman web 

###Mohon maaf namun terjadi kesalahan teknis dimana halaman login tidak responsif, oleh karena itu, isi dari read.php dimasukkan ke dalam index.php 

### Bagian 1: Client-side Programming (Bobot: 30%)
DOM digunakan dalam index.php untuk mengambil username, memeriksa cookie, dan menetapkan cookie seperti kode dibawah ini
```script
function checkCookie() {
            var userIdCookie = getCookie('user_id');
            if(userIdCookie) {
                window.location.href = 'read.php';
            }
        }

        // Fungsi dibawah ini berguna untuk mengambil nilai cookie berdasarkan namanya yang telah tersimpan pada komputer pengguna
        function getCookie(name) {
            var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? match[2] : null;  
        }

        checkCookie();
        document.addEventListener("DOMContentLoaded", function () {
            const loginForm = document.querySelector('form');

            loginForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const username = document.getElementsByName("username")[0].value;
                const password = document.getElementsByName("password")[0].value;

                fetch('login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        'username': username,
                        'password': password,
                    }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Menetapkan cookie dan melakukan proses redirect
                            document.cookie = "user_id=" + encodeURIComponent(data.user_id) + "; expires=" + new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000).toUTCString() + "; path=/";
                            window.location.href = 'read.php';
                        } else {
                            // Jika gagal
                            window.location.href = 'index.php';
                        }
                    });
            });
        });
```

### Bagian 2: Server-side Programming (Bobot: 30%)
Berikut merupakan kode-kode php yang digunakan dalam situs ini 
1.`create.php` yang berguna untuk menambahkan data dari database nakamaDB
2. `read.php` yang berguna untuk membaca data dari database nakamaDB
3. `update.php` yang berguna untuk memperbarui data dari database nakamaDB
4. `hapus.php` yang berguna untuk menghapus data dari database nakamaDB
5. `edit.php` yang berguna untuk melakukan perubahan terhadap form dari situs

### Bagian 3: Database Management (Bobot: 20%)
Berikut merupakan kode dari database yang digunakan pada projek ini 

```sql
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
```

berikut merupakan kode untuk melakukan config.php
```php
<?php
// menginisialisasikan variabel-variabel config 
$servername = "localhost";
$username = "root";
$password = "";
$database = "nakamaDB";

 // bagian ini berguna untuk memeriksa koneksi
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
```

### Bagian 4: State Management (Bobot: 20%)
berikut kode-kode yang digunakan untuk melakukan state management pada situs nakama
```php
 <?php if (isset($_SESSION['Error'])) { ?>
            <p class="Error">
                <?php echo $_SESSION['Error']; ?>
            </p> 
            <?php unset($_SESSION['Error']); ?>
        <?php } ?>
```

berikut merupakan kode-kode yang digunakan untuk melakukan management terhadap cookie untuk pengguna yang mengakses website nakama
```script
// memeriksa cookie 
        function checkCookie() {
            var userIdCookie = getCookie('user_id');
            if(userIdCookie) {
                window.location.href = 'read.php';
            }
        }

        // Fungsi dibawah ini berguna untuk mengambil nilai cookie berdasarkan namanya yang telah tersimpan pada komputer pengguna
        function getCookie(name) {
            var match = document.cookie.match(new RegExp('(^| )' + name + '=([^;]+)'));
            return match ? match[2] : null;  
        }

        checkCookie();
        document.addEventListener("DOMContentLoaded", function () {
            const loginForm = document.querySelector('form');

            loginForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const username = document.getElementsByName("username")[0].value;
                const password = document.getElementsByName("password")[0].value;

                fetch('login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: new URLSearchParams({
                        'username': username,
                        'password': password,
                    }),
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Menetapkan cookie dan melakukan proses redirect
                            document.cookie = "user_id=" + encodeURIComponent(data.user_id) + "; expires=" + new Date(new Date().getTime() + 30 * 24 * 60 * 60 * 1000).toUTCString() + "; path=/";
                            window.location.href = 'read.php';
                        } else {
                            // Jika gagal
                            window.location.href = 'index.php';
                        }
                    });
            });
        });
```

### Bagian 5 Penghostingan Website UAS
link untuk situs Nakama bisa diakses pada berikut ini : https://nakamaonepieceuas.000webhostapp.com/ 
