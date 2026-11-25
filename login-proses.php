<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
    $requestUsername = $_POST['username'];
    $requestPassword = $_POST['password'];

    $sql = "SELECT * FROM tb_user WHERE username = '$requestUsername'";
    $result = mysqli_query($koneksi, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // cek password dengan hash yang ada di database
        if (password_verify($requestPassword, $row['password'])) {
            session_start();
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            // admin ke dashboard, user biasa ke halaman utama
            if ($row['role'] == 'admin') {
                header('location:admin/dashboard.php');
            } else {
                header('location:index.php');
            }
        } else {
            echo "
                <script>
                    alert('username atau password anda salah, Silahkan coba lagi');
                    window.location = 'login.php';
                </script>
            ";
        }
    } else {
        echo "
            <script>
                alert('username atau password anda salah, Silahkan coba lagi');
                window.location = 'login.php';
            </script>
        ";
    }
} else {
    header('location: login.php');
}
?>