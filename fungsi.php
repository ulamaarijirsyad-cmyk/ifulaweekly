<?php

    $koneksi = mysqli_connect("localhost", "root", "", "ifulaweekly");

    function tampildata($query)
    {
        global $koneksi;

        $result = mysqli_query($koneksi, $query);

        $rows = [];

        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }
        
        return $rows;
    }

    function editdata($data, $id, $foto)
    {
       global $koneksi;

       $nama = htmlspecialchars($data["nama"]);
       $nim = htmlspecialchars ($data["nim"]);
       $prodi = htmlspecialchars ($data["jurusan"]);
       $email = htmlspecialchars ($data["email"]);
       $nohp = htmlspecialchars ($data["nohp"]);
       $foto = htmlspecialchars ($data["foto"]);

       ///$namafoto = $foto["name"];
      /// $newnamefoto = date('dmYhis_').$namafoto;
     ///  $tmpfoto = $foto["tmp_name"];

      /// $path = "assets/images/$newnamefoto";

      /// if(move_uploaded_file($tmpfoto, $path))

       $query = "INSERT INTO mahasiswa (nama,nim,jurusan,email,no_hp,foto)
       VALUES ('$nama','$nim', '$prodi', '$email', '$nohp', '$foto' )";

       $query ="UPDATE mahasiswa SET 
                    nama='$nama',
                    nim='$nim',
                    jurusan='$prodi',
                    email='$email',
                    no_hp='$nohp',
                    foto='$foto'
                WHERE id=$id
       ";
 

       mysqli_query($koneksi, $query);
       return mysqli_affected_rows($koneksi);
    }

    function deletedata($id)
    {
        global $koneksi;

        $query = "DELETE FROM mahasiswa WHERE id=$id";
        mysqli_query($koneksi, $query);
        return mysqli_affected_rows($koneksi);

    }

    function inputdata($data, $foto)
    {
       global $koneksi;

       $nama = htmlspecialchars($data["nama"]);
       $nim = htmlspecialchars ($data["nim"]);
       $prodi = htmlspecialchars ($data["jurusan"]);
       $email = htmlspecialchars ($data["email"]);
       $nohp = htmlspecialchars ($data["nohp"]);
       
       $namafoto = $foto["name"];
       $newnamefoto = date('dmYhis_').$namafoto;
       $tmpfoto = $foto["tmp_name"];

       $path = "assets/images/$newnamefoto";

       if(move_uploaded_file($tmpfoto, $path))
        {
            $query = "INSERT INTO mahasiswa (nama,nim,jurusan,email,no_hp,foto)
            VALUES ('$nama','$nim', '$prodi', '$email', '$nohp', '$newnamefoto' )"; 

            mysqli_query($koneksi, $query);
            
        }

        return mysqli_affected_rows($koneksi);
       
    }

    function register($data)
    {
        global $koneksi;

        $username = stripslashes($data["username"]); /// dijadikan kecil semua
        $password1 = mysqli_real_escape_string($koneksi,$data["password1"]);
        $password2 = mysqli_real_escape_string($koneksi,$data["password2"]);

        if($password1 != $password2)
            {
                echo "<script>
                    alert('Konfirmasi password tidak sesuai');
                </script>";
                return false;
            }

        /// cek user name
        $queryrow = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($koneksi,$queryrow);

        if(mysqli_num_rows($result) == 1)
            {
                echo "<script>
                alert('Username sudah digunakan!');
                </script>";
                return false;
            }



       // Enkripsi -> mengubah plain text (text asli) menjadi teks rahasia

       $password = password_hash($password1,PASSWORD_DEFAULT);

       $query ="INSERT INTO user (username,password) VALUES
                ('$username', '$password')";

        mysqli_query($koneksi,$query);

        return mysqli_affected_rows ($koneksi);
       
    }

    // Tambahkan fungsi ini di bagian bawah file fungsi.php Anda

function login($data)
{
    global $koneksi;

    $username = mysqli_real_escape_string($koneksi, $data["username"]);
    $password = mysqli_real_escape_string($koneksi, $data["password"]);

    // 1. Cek apakah username ada di database
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        // Ambil data user dari database
        $row = mysqli_fetch_assoc($result);

        // 2. Cek apakah password sesuai dengan hash di database
        if (password_verify($password, $row["password"])) {
            
            // 3. Set Session jika login sukses
            $_SESSION["login"] = true;
            $_SESSION["username"] = $row["username"];

            return true;
        }
    }

    // Jika username tidak ada atau password salah
    return false;
}


?>