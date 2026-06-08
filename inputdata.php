<?php
    $koneksi = mysqli_connect("localhost", "root", "", "ifikoweekly");

    // 1. Inisialisasi variabel kosong untuk mode "Tambah Data"
    $id = "";
    $nama = "";
    $nim = "";
    $jurusan = "";
    $email = "";
    $telepon = "";
    $foto = "";
    // Note: Variabel lain seperti password, tanggal_lahir, dll bisa ditambahkan di sini 
    // jika sudah ada kolomnya di database tabel 'mahasiswa'.

    // 2. Cek apakah ada parameter 'id' di URL (Mode "Edit Data")
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM mahasiswa WHERE id = '$id'";
        $result = mysqli_query($koneksi, $query);
        
        if ($data = mysqli_fetch_assoc($result)) {
            // Isi variabel dengan data dari database Laragon/MySQL
            $nama = $data['nama'];
            $nim = $data['nim'];
            $jurusan = $data['jurusan'];
            $email = $data['email'];
            $telepon = $data['no_hp']; // Menyesuaikan dengan nama kolom di database sebelumnya
            $foto = $data['foto'];
        }
    }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?php echo ($id != "") ? "Edit" : "Input"; ?> Data Mahasiswa | WEB INFORMATIKA</title>
</head>
<body>

    <div class="container">
        
        <h1><?php echo ($id != "") ? "Edit" : "Input"; ?> Data Mahasiswa</h1>
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
        
        <form action="proses_data.php" method="POST" enctype="multipart/form-data">
            
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
                    <td><label for="Program Studi">Program Studi</label></td>
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
                    <td><input type="number" name="no_hp" id="nohp" value="<?php echo $telepon; ?>" required/></td>   
                </tr>
                
                <tr>
                    <td><label for="foto">Foto</label></td>
                    <td>:</td>
                    <td>
                        <input type="text" name="foto" id="foto"/><br>
                    </td>
                </tr>
                
            </table>
            
            <input type="submit" name="submit" value="<?php echo ($id != "") ? "Simpan Perubahan" : "Kirim Data"; ?>"/>
        </form>
    </div>
</body>
</html>