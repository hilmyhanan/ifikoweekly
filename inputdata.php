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
                    <td><input type="text" name="nim" id="nim" value="<?php echo $nim; ?>" required/></td>
                </tr>
                <tr>
                    <td><label for="Password">Password</label></td>
                    <td>:</td>
                    <td><input type="password" name="password" id="password"></td>
                </tr>
                <tr>
                    <td><label for="email">Email</label></td>
                    <td>:</td>
                    <td><input type="email" name="email" id="email" value="<?php echo $email; ?>" required/></td>
                </tr>
                <tr>
                    <td><label for="telepon">No HP</label></td>
                    <td>:</td>
                    <td><input type="text" name="telepon" id="telepon" value="<?php echo $telepon; ?>" required/></td>   
                </tr>
                <tr>
                    <td><label for="website">Website Pribadi</label></td>
                    <td>:</td>
                    <td><input type="url" name="website" id="website"/></td>
                </tr>
                <tr>
                    <td><label for="tanggal_lahir">Tanggal Lahir</label></td>
                    <td>:</td>
                    <td><input type="date" name="tanggal_lahir" id="tanggal_lahir"/></td>
                </tr>
                <tr>
                    <td><label for="warna_favorit">Warna Favorit</label></td>
                    <td>:</td>
                    <td><input type="color" name="warna_favorit" id="warna_favorit"/></td>
                </tr>
                <tr>
                    <td><label for="tingkat_kepuasan">Tingkat Kepuasan</label></td>
                    <td>:</td>
                    <td><input type="range" min="0" max="10" name="tingkat_kepuasan" id="tingkat_kepuasan"></td>
                </tr>
                <tr>
                    <td><label for="jenis_kelamin">Jenis Kelamin</label></td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="jenis_kelamin" id="laki-laki" value="Laki-laki"/>
                        <label for="laki-laki">Laki-laki</label>
                        <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan"/>
                        <label for="perempuan">Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="hobi">Hobi</label></td>
                    <td>:</td>
                    <td>
                        <input type="checkbox" name="hobi" id="membaca" value="Membaca"/>
                        <label for="membaca">Membaca</label>
                        <input type="checkbox" name="hobi" id="olahraga" value="Olahraga"/>
                        <label for="olahraga">Olahraga</label>
                        <input type="checkbox" name="hobi" id="musik" value="Musik"/>
                        <label for="musik">Musik</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="foto">Foto</label></td>
                    <td>:</td>
                    <td>
                        <input type="file" name="foto" id="foto"/><br>
                        <?php if($foto != "") { echo "<small>Foto saat ini: $foto</small>"; } ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat</label></td>
                    <td>:</td>
                    <td><textarea name="alamat" id="alamat" rows="4" cols="30"></textarea></td>
                </tr>
                <tr>
                    <td><label for="jurusan">Jurusan</label></td>
                    <td>:</td>
                    <td>
                        <select name="jurusan" id="jurusan" required>
                            <option value="">Pilih Jurusan</option>
                            <option value="Informatika" <?php if($jurusan == 'Informatika') echo 'selected'; ?>>Informatika</option>
                            <option value="Sistem Informasi" <?php if($jurusan == 'Sistem Informasi') echo 'selected'; ?>>Sistem Informasi</option>
                            <option value="Teknik Komputer" <?php if($jurusan == 'Teknik Komputer') echo 'selected'; ?>>Teknik Komputer</option>
                            <option value="Teknik Elektro" <?php if($jurusan == 'Teknik Elektro') echo 'selected'; ?>>Teknik Elektro</option>
                        </select>
                    </td>
                </tr>
            </table>
            
            <input type="submit" name="submit" value="<?php echo ($id != "") ? "Simpan Perubahan" : "Kirim Data"; ?>"/>
        </form>
    </div>
</body>
</html>