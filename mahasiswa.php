<?php

   // $koneksi = mysqli_connect("localhost", "root", "", "ifulaweekly");
   
    //if($koneksi)
    //{
    //  echo "Berhasil Konek";
    //}

    

    /// ambil data (fetch) mahasiswa dari lemari result

    /// mysqli_fetch_row array num
    /// mysqli_fetch_assoc array asosiatif
    // mysqli_fetch_object -> object data
    // mysqli_fetch_array 

   /// 

    //while ($mhs = mysqli_fetch_assoc($result));
    //{
      //  var_dump($mhs);
    //}
    require 'fungsi.php';
    $qmahasiswa = "SELECT * FROM mahasiswa";
    $mahasiswas = tampildata ($qmahasiswa);

    

?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>WEB INFORMATIKA</h1>
    <hr>
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <td><a href="index.php">Home</a></td>
            <td><a href="profile.php">Profile</a></td>
            <td><a href="contact.php">Contact</a></td>
            <td><a href="mahasiswa.php">Data Mahasiswa</td>
        </tr>
    </table>
    <h2>Data Mahasiswa</h2>
    <a href="inputdata.php">
        <button class="btn-tambah">Tambah Data</button>
    </a>
    <table border="1" cellpadding="5px">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>email</th>
            <th>No. HP</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php
            $i = 1;

            foreach ($mahasiswas as $mhs)
            {
        ?>
        <tr>
            <td align="center"><? $i ?></td>
            <td><?php echo $mhs ["nama"]?></td>
            <td><?php echo $mhs["nim"]?></td>
            <td><?php echo $mhs["jurusan"]?></td>
            <td align="center"><?php echo $mhs["email"]?></td>
            <td align="center"><?php echo $mhs["no_hp"]?></td>
            <td align="center"><img src="assets/images/<?=  $mhs["foto"]?>" width="70px" /></td>
                
            <td>
                <a href="editdata.php?id=<?= $mhs["id"] ?>"><button>EDIT</button></a> | <a
                href ="deletedata.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Yakinnnn?')"><button>DELETE</button></a>
            </td>
        </tr>
        <?php
            $i++;
            }
        
        ?>
    </table>
    <table border="1" cellspacing="0" cellpadding="10px">
        <tr>
            <th>1,1</th>
            <th>1,2</th>
            <th>1,3</th>
            <th>1,4</th>
        </tr>
        <tr>
            <th>2,1</th>
            <th rowspan="2" colspan="2" align="center">?</th>
            <th>2,4</th>
        </tr>
        <tr>
            <th>3,1</th>
            <th>3,4</th>
        </tr>
        <tr>
            <th>4,1</th>
            <th>4,2</th>
            <th>4,3</th>
            <th>4,4</th>
        </tr>
    </table>
</body>

</html>