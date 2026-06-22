<?php
   
    require 'fungsi.php';

    $qmahasiswa = "SELECT * FROM mahasiswa"; //karena query k table mahasiswa

    $mahasiswas= tampildata($qmahasiswa); //menghasilkan data dalam wadah 
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
            foreach($mahasiswas as $mhs)
                {
        ?>
        <tr>
            <td align="center"><?php echo $mhs['id']; ?></td>
            <td><?php echo $mhs['nama']; ?></td>
            <td align="center"><?php echo $mhs['nim']; ?></td>
            <td align="center"><?php echo $mhs['jurusan']; ?></td>
            <td align="center"><?php echo $mhs['email']; ?></td>
            <td align="center"><?php echo $mhs['no_hp']; ?></td>
            <td align="center">
                <img src="assets/images/<?php echo $mhs['foto']; ?>" alt="Foto Mahasiswa" width="50">
            </td>
            <td align="center">
                <a href="editdata.php?id=<?php echo $mhs['id']; ?>">Edit</a> | 
                <a href="hapusdata.php?id=<?php echo $mhs['id']; ?>" onclick="return confirm('Yakin ingin menghapus data <?php echo $mhs['nama']; ?>?');">Hapus</a>
        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>