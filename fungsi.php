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

        function tambahdata($data) 
        {
        global $koneksi;

        $nama = htmlspecialchars($_POST["nama"]);
        $nim = htmlspecialchars($_POST["nim"]);
        $jurusan = htmlspecialchars($_POST["jurusan"]);
        $email = htmlspecialchars($_POST["email"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]);
        $foto = htmlspecialchars($_POST["foto"]);

        $query = "INSERT INTO mahasiswa (nama, nim, jurusan, email, no_hp, foto) 
                  VALUES ('$nama', '$nim', '$jurusan', '$email', '$no_hp', '$foto')";

         $hasil = mysqli_query($koneksi, $query);

         return mysqli_affected_rows($koneksi); 

        }


        function hapusdata($id) 
        {
            global $koneksi;
            mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
            return mysqli_affected_rows($koneksi);
        }

        function editdata($data, $id) 
        {
        global $koneksi;

        $nama = htmlspecialchars($_POST["nama"]);
        $nim = htmlspecialchars($_POST["nim"]);
        $jurusan = htmlspecialchars($_POST["jurusan"]);
        $email = htmlspecialchars($_POST["email"]);
        $no_hp = htmlspecialchars($_POST["no_hp"]);
        $foto = htmlspecialchars($_POST["foto"]);

        $query = "UPDATE mahasiswa SET nama = '$nama', nim = '$nim', jurusan = '$jurusan', email = '$email', no_hp = '$no_hp', foto = '$foto' WHERE id = $id";

         $hasil = mysqli_query($koneksi, $query);

         return mysqli_affected_rows($koneksi); 

        }

?>