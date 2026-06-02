<?php
    $koneksi = mysqli_connect("localhost", "root", "", "ifikoweekly");

    $query = "SELECT * FROM mahasiswa";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        echo "Query error: " . mysqli_error($koneksi);
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa | WEB INFORMATIKA</title>
</head>
<body>
    <h1>DATA MAHASISWA</h1>
    <hr>
    
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profil.php">Profil</a></td>
            <td><a href="contact.php">Kontak Saya</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</a></td>
        </tr>
    </table>

    <h3>Data Mahasiswa</h3>
    
    <a href="inputdata.php">
        <button>Tambah Data</button>
    </a>
    <br><br>
    
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>JURUSAN</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>

        <?php
            while ($mhs = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td align="center"><?php echo $mhs['id']; ?></td>
            <td><?php echo $mhs['nama']; ?></td>
            <td align="center"><?php echo $mhs['nim']; ?></td>
            <td align="center"><?php echo $mhs['jurusan']; ?></td>
            <td align="center"><?php echo $mhs['email']; ?></td>
            <td align="center"><?php echo $mhs['no_hp']; ?></td>
            <td align="center">
                <img src="<?php echo $mhs['foto']; ?>" width="70px" alt="Foto <?php echo $mhs['nama']; ?>"/>
            </td>
            <td align="center">
                <a href="edit.php?id=<?php echo $mhs['id']; ?>">Edit</a> | 
                <a href="hapus.php?id=<?php echo $mhs['id']; ?>" onclick="return confirm('Yakin ingin menghapus data <?php echo $mhs['nama']; ?>?');">Hapus</a>
            </td>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>