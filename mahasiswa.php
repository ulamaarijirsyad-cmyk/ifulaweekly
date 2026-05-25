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
        <tr>
            <td align="center">1</td>
            <td>Ula Ma'arij Irsyad</td>
            <td>13182420013</td>
            <td>S1 Informatika</td>
            <td align="center">ulamaarijirsyad@gmail.com</td>
            <td align="center">0821002435432</td>
            <td align="center">
                <img src="assets/images/Windah-basudara.jpg" width="70px">
            <td>
                <button class="btn-edit">EDIT</button>
                <button class="btn-delete">DELETE</button>
            </td>
        </tr>
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