<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Website Nakama One Piece </title>
</head>
<body>
    <p class="info-login"> Berikut merupakan credential bawaan <br> Username : Nakama <br> Password : May5 </p> 
    
    <form action="login.php" method="post">
        <!-- Buat image nakama disini dengan photo luffy <img src> -->
        <h2> Login untuk jadi Nakama Luffy </h2>
        <?php if (isset($_SESSION['Error'])) { ?>
            <p class="Error">
                <?php echo $_SESSION['Error']; ?>
            </p> 
            <?php unset($_SESSION['Error']); ?>
        <?php } ?>
        <label> Username : </label>
        <input type="text" name="username" placeholder="Inputkan username">

        <label> Password : </label>
        <input type="password" name="password" placeholder="Inputkan password">

        <button type="submit">Login</button>
    </form>

    <!-- berikut merupakan bagian untuk cookie atau state management -->
    <script>
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
    </script>
</body>
</html>