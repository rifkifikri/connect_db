<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <style>
        body{
            background-color:#BFFFF0;
        }
        thead{
            background-color:#65C18C
        }
    </style>
    <title>Perpus</title>
</head>
<body >
    <div class="container">
        <center>
        <h1>DAFTAR PEMINJAM BUKU PERPUS AB</h1>
        <br/><br/>
        </center>
        <?php
            include("connect.php");
        ?>
    <table class="table table-hover" >
        <div class="row" style="margin:50px">
            <div class=col-md-3>
                <a href="buku.php"  class="btn btn-outline-info" type="button"> Buku</a>
            </div>
            <div class=col-md-3>
                <a href="penerbit.php" class="btn btn-outline-info" type="button"> Penerbit</a>
            </div>
            <div class=col-md-3>
                <a href="anggota.php" class="btn btn-outline-info" type="button"> Anggota</a>
            </div>
            <div class=col-md-3>
                <a href="pengarang.php" class="btn btn-outline-info" type="button"> pengarang</a>
            </div>
        </div>
        <div class="row" style="margin:10px">
            <div class=col-md-5>
            <a href="new_book.php"  class="btn btn-outline-info" type="button"> ADD NEW BOOK</a>
            </div>
        </div>
        <thead >
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Alamat</td>
                <td>sex</td>
                <td>Buku Pinjaman</td>
                <td>Kategori</td>
                <td>Edit</td>
            </tr>
        </thead>
        <tbody>
        <?php
        $no = 1;
        $ambilData = mysqli_query($koneksi,"select * from peminjaman inner join anggota on peminjaman.id_anggota=anggota.id_anggota
                                        inner join detail_peminjaman on detail_peminjaman.id_pinjam = peminjaman.id_pinjam
                                        inner join buku on buku.isbn=detail_peminjaman.isbn
                                        inner join katalog on katalog.id_katalog=buku.id_katalog");
        while( $tampil=mysqli_fetch_array($ambilData)){
            ?>
                <tr>
                    <td scope ="row"><?php echo $no?></td>
                    <td scope ="row"><?php echo $tampil["nama"]?></td>
                    <td scope ="row"><?php echo $tampil["alamat"]?></td>
                    <td scope ="row"><?php echo $tampil["sex"]?></td>
                    <td scope ="row"><?php echo $tampil["judul"]?></td>
                    <td scope ="row"><?php echo $tampil["jenis_katalog"]?></td>
                    <td><a href='edit.php? id=<?php echo $tampil["id_anggota"] ?>' class="btn btn-warning" type="button"> EDIT</a></td>
                </tr>
            <?php
                ;
            $no++;
        }
        
        ?>
        </tbody>
    </table>
    <!-- // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfullyy"; -->
    </div>
    
</body>
</html>