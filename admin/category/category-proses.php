<?php
include '../../koneksi.php';

// fungsi upload foto (dari modul), $halaman = halaman tujuan jika upload gagal
function upload($halaman) {
    $namaFile = $_FILES['photo']['name'];
    $error = $_FILES['photo']['error'];
    $tmpName = $_FILES['photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = '$halaman';
            </script>
        ";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar (jpg, jpeg, png)');
                window.location = '$halaman';
            </script>
        ";
        return false;
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../img_categories/' . $namaFileBaru);

    return $namaFileBaru;
}

if (isset($_POST['simpan'])) {
    // ---------- CREATE ----------
    $nama_kategori = $_POST['nama_kategori'];
    $harga_sewa = $_POST['harga_sewa'];
    $deskripsi = $_POST['deskripsi'];

    if (empty($nama_kategori) || empty($harga_sewa) || empty($deskripsi)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'category-entry.php';
            </script>
        ";
    } else {
        $photo = upload('category-entry.php');
        if (!$photo) {
            exit;
        }

        $sql = "INSERT INTO tb_category (foto, nama_kategori, harga_sewa, deskripsi)
                VALUES ('$photo', '$nama_kategori', '$harga_sewa', '$deskripsi')";

        if (mysqli_query($koneksi, $sql)) {
            echo "
                <script>
                    alert('Data Kategori Berhasil Ditambahkan');
                    window.location = 'category.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Terjadi Kesalahan');
                    window.location = 'category-entry.php';
                </script>
            ";
        }
    }
} elseif (isset($_POST['edit'])) {
    // ---------- UPDATE ----------
    $id = $_POST['id'];
    $nama_kategori = $_POST['nama_kategori'];
    $harga_sewa = $_POST['harga_sewa'];
    $deskripsi = $_POST['deskripsi'];
    $photoLama = $_POST['photoLama'];

    if (empty($nama_kategori) || empty($harga_sewa) || empty($deskripsi)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'category-edit.php?id=$id';
            </script>
        ";
        exit;
    }

    // cek apakah user memilih gambar baru atau tidak
    if ($_FILES['photo']['error'] === 4) {
        $photo = $photoLama;
    } else {
        $photo = upload('category-edit.php?id=' . $id);
        if (!$photo) {
            exit;
        }
        // foto lama dihapus dan diganti foto baru
        if ($photoLama != '' && file_exists('../../img_categories/' . $photoLama)) {
            unlink('../../img_categories/' . $photoLama);
        }
    }

    $sql = "UPDATE tb_category SET
                foto = '$photo',
                nama_kategori = '$nama_kategori',
                harga_sewa = '$harga_sewa',
                deskripsi = '$deskripsi'
            WHERE id = $id";

    if (mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Kategori Berhasil Diubah');
                window.location = 'category.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'category-edit.php?id=$id';
            </script>
        ";
    }
} elseif (isset($_POST['hapus'])) {
    // ---------- DELETE ----------
    $id = $_POST['id'];

    // cek apakah kategori masih dipakai transaksi
    $cek = mysqli_query($koneksi, "SELECT * FROM tb_transaction WHERE id_category = $id");

    if (mysqli_num_rows($cek) > 0) {
        echo "
            <script>
                alert('Kategori masih dipakai transaksi, tidak dapat dihapus');
                window.location = 'category.php';
            </script>
        ";
    } else {
        // ambil nama foto
        $result = mysqli_query($koneksi, "SELECT * FROM tb_category WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
        $photo = $row['foto'];

        $sql = "DELETE FROM tb_category WHERE id = $id";

        if (mysqli_query($koneksi, $sql)) {
            // hapus file gambar
            if ($photo != '' && file_exists('../../img_categories/' . $photo)) {
                unlink('../../img_categories/' . $photo);
            }
            echo "
                <script>
                    alert('Data Kategori Berhasil Dihapus');
                    window.location = 'category.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Data Kategori Gagal Dihapus');
                    window.location = 'category.php';
                </script>
            ";
        }
    }
} else {
    header('location: category.php');
}
?>