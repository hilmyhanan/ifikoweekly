<?php
    // Pastikan file fungsi.php mendefinisikan koneksi database ke variabel $koneksi
    require 'fungsi.php';

    // 1. Inisialisasi variabel kosong untuk mencegah error 'Undefined Variable' saat halaman pertama dimuat
    $id = "";
    $nama = "";
    $nim = "";
    $jurusan = "";
    $email = "";
    $no_hp = "";
    $foto = "";

    // 2. Logika ketika form di-submit
    if (isset($_POST["submit"])) {

        if (tambahdata($_POST) > 0)  {
            echo "<script>
                    alert('Data berhasil disimpan!');
                    document.location.href = 'mahasiswa.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Data gagal disimpan!');
                    document.location.href = 'mahasiswa.php';
                  </script>";
        }
        
    
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiswa | WEB INFORMATIKA</title>
</head>
<body>

    <div class="container">
        <h1>Data Mahasiswa</h1>
        <hr>
        
        <table border="1" cellspacing="0" cellpadding="10px">
            <tr>
                <td><a href="index.php">Home</a></td>
                <td><a href="profil.php">Profil</a></td>
                <td><a href="contact.php">Kontak Saya</a></td>
                <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
            </tr>
        </table>
        
        <h2>Form Mahasiswa</h2>
        
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <table border="0" cellspacing="5px">
                <tr>
                    <td><label for="nama">Nama</label></td>
                    <td>:</td>
                    <td><input type="text" name="nama" id="nama" value="<?php echo $nama; ?>" required/></td>
                </tr>
                <tr>
                    <td><label for="nim">NIM</label></td>
                    <td>:</td>
                    <td><input type="number" name="nim" id="nim" value="<?php echo $nim; ?>" required/></td>
                </tr>
                <tr>
                    <td><label for="prodi">Program Studi</label></td>
                    <td>:</td>
                    <td><input type="text" name="jurusan" id="prodi" value="<?php echo $jurusan; ?>"></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td>:</td>
                    <td><input type="email" name="email" id="email" value="<?php echo $email; ?>" required/></td>
                </tr>
                <tr>
                    <td><label for="nohp">No HP</label></td>
                    <td>:</td>
                    <td><input type="number" name="no_hp" id="nohp" value="<?php echo $no_hp; ?>" required/></td>   
                </tr>
                <tr>
                    <td><label for="foto">Foto</label></td>
                    <td>:</td>
                    <td>
                        <input type="text" name="foto" id="foto" value="<?php echo $foto; ?>"/><br>
                    </td>
                </tr>
            </table>
            
            <input type="submit" name="submit" value="<?php echo ($id != "") ? "Simpan Perubahan" : "Kirim Data"; ?>"/>
        </form>
    </div>
</body>
</html>