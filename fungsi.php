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
?>