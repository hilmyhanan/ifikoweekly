<?php
         $koneksi = mysqli_connect("localhost", "root", "", "ifikoweekly");

        function tampildata($query) 
        { // Menggunakan koneksi global
            global $koneksi;
            $result = mysqli_query($koneksi, $query); // lemari

            $rows = []; //wadah
            while ($row = mysqli_fetch_assoc($result)) 
                {
                $rows[] = $row; // mengambil isi lemari (baju) kdan menaruh ke wadah (array)
            }
            
            return $rows;
        }

        function tambahdata($data, $files) 
        {
        global $koneksi;

        $nama = htmlspecialchars($_POST["nama"]);
        $nim = htmlspecialchars($_POST["nim"]);
        $jurusan = htmlspecialchars($_POST["jurusan"]);
        $email = htmlspecialchars($_POST["email"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]);

        $namafoto = $files["foto"]["name"];
        $tmpfoto = $files["foto"]["tmp_name"];

        $path = "assets/images/" .$namafoto;

        if (move_uploaded_file($tmpfoto, $path)) 
            {
            $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) 
                  VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$namafoto')";

            $hasil = mysqli_query($koneksi, $query);

            return mysqli_affected_rows($koneksi); 
        } 
        
        }


        function hapusdata($id) 
        {
            global $koneksi;
            mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
            return mysqli_affected_rows($koneksi);
        }

       function editdata($data, $files, $id) 
{
    global $koneksi;

    $nama = htmlspecialchars($data["nama"]);
    $nim = htmlspecialchars($data["nim"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $email = htmlspecialchars($data["email"]);
    $no_hp = htmlspecialchars($data["no_hp"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]); // Ambil nama foto lama dari hidden input

    // Cek apakah user mengupload gambar baru
    if ($files['foto']['error'] === 4) {
        // Jika error 4 (tidak ada file yang diupload), gunakan foto lama
        $namafoto = $fotoLama;
    } else {
        // Jika ada file baru yang diupload, proses uploadnya
        $namafoto = $files["foto"]["name"];
        $tmpfoto = $files["foto"]["tmp_name"];
        $path = "assets/images/" . $namafoto;

        if (!move_uploaded_file($tmpfoto, $path)) {
           // Jika gagal upload (misal folder tidak ada), kembalikan nilai 0 agar dianggap gagal
           return 0;
        }
    }

    $query = "UPDATE mahasiswa SET 
                nama = '$nama', 
                nim = '$nim', 
                jurusan = '$jurusan', 
                email = '$email', 
                no_hp = '$no_hp', 
                foto = '$namafoto' 
              WHERE id = $id";

    $hasil = mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi); 
}

       
