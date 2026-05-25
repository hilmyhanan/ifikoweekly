<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiwa | WEB INFORMATIKA</title>
</head>
<body>
    <h1>DATA MAHASISWA</h1>
        <hr>
        <table border="1" cellspacing="0" cellpadding="10px">
            <tr>
                <td> 
                    <a href="index.php">Home</a>
                </td>
                <td>
                    <a href="profil.php">Profil</a>
                </td>
                <td>
                    <a href="contact.php">Kontak Saya</a>
                </td>
                <td>
                    <a href="mahasiswa.php">Data Mahasiswa</a>
                </td>
            </tr>
        </table>

        <h3>Data Mahasiswa</h3>
        
            <a href="inputdata.php">Tambah Data
                <button>Tambah Data</button>
            </a>
            <br>
            <br>
        
        <table border="1" cellpadding="10px">
            <tr>
                <th rowspan="2">Nomor</th>
                <th rowspan="2">Nama</th>
                <th colspan="3" align="center">Nilai</th>
                <th rowspan="2">Foto</th>
            </tr>
            <tr>
                <th>UTS</th>
                <th>UAS</th>
                <th>TUGAS</th>
            </tr>
            <td align="center">1</td>
            <td>Jokowi Wiwokdetok</td>
            <td align="center">80</td>
            <td align="center">85</td>
            <td align="center">90</td>
            <td><img src="data:image/jpeg;base64,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" width="70px"/></td>

            </tr>
            <td align="center">1</td>
            <td>Gibran Fufu</td>
            <td align="center">10</td>
            <td align="center">20</td>
            <td align="center">40</td>
            <td><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ6fjLHm3rDtSMhfBjifUrCjk3G3yOQoUjWgw&s" width="70px"/></td>
        </table>
        <hr>
        <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <td>1.1</td>
            <td>1.2</td>
            <td>1.3</td>
            <td>1.4</td>
        </tr>
        <tr>
            <td>2.1</td>
            <th colspan="2" rowspan="2" align="center">?</th>
            <td>2.4</td>
        </tr>
        <tr>
            <td>3.1</td>
            <td>3.4</td>
            
        </tr>
        <tr>
            <td>4.1</td>
            <td>4.2</td>
            <td>4.3</td>
            <td>4.4</td>
        </tr>
</body>
</html>