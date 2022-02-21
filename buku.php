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
    <title>Buku</title>
</head>
<body>
<div class="container">
        <center>
        <h1>DAFTAR BUKU dan Kategori PERPUS AB</h1>
        <br/><br/>
        </center>
        <?php
    include("connect.php");
    ?>
    <table class=table>
        <div class="row" style="margin:50px">
            <div class=col-md-3>
                <a href="indext.php" class="btn btn-primary"> Back</a>
            </div>
            
        </div>
        <thead >
            <tr>
                <td>No</td>
                <td>Buku Pinjaman</td>
                <td>Kategori</td>
            </tr>
        </thead>
        <?php
        $no = 1;
        $ambilData = mysqli_query($koneksi,"select * from buku left join katalog on buku.id_katalog=katalog.id_katalog");
        while( $tampil=mysqli_fetch_array($ambilData)){
            echo("
                <tr>
                    <td>$no</td>
                    <td>$tampil[judul]</td>
                    <td>$tampil[jenis_katalog]</td>
                </tr>
            ");
            $no++;
        }
        
        ?>
    </table>
    <!-- // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfullyy"; -->
    </div>
</body>
</html>