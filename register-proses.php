<?php
include 'koneksi.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm  = $_POST['confirm'];

    // cek apakah ada yang kosong
    if (empty($username) || empty($password) || empty($confirm)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'register.php';
            </script>
        ";
    // cek password dan confirm password sama
    } elseif ($password != $confirm) {
        echo "
            <script>
                alert('Password dan Confirm Password tidak sama');
                window.location = 'register.php';
            </script>
        ";
    } else {
        // cek apakah username sudah dipakai
        $cek = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

        if (mysqli_num_rows($cek) > 0) {
            echo "
                <script>
                    alert('Username sudah dipakai, silahkan gunakan yang lain');
                    window.location = 'register.php';
                </script>
            ";
        } else {
            // password disimpan dalam bentuk hash
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO tb_user (username, password) VALUES ('$username', '$passwordHash')";

            if (mysqli_query($koneksi, $sql)) {
                echo "
                    <script>
                        alert('Registrasi Berhasil Silahkan login');
                        window.location = 'login.php';
                    </script>
                ";
            } else {
                echo "
                    <script>
                        alert('Terjadi Kesalahan');
                        window.location = 'register.php';
                    </script>
                ";
            }
        }
    }
} else {
    header('location: register.php');
}
?>