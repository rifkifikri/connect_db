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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <style>
        body{
            background-color:#BFFFF0;
        }
        thead{
            background-color:#65C18C
        }
    </style>
    <title>Edit</title>
</head>
<body>
  
    <center>
        <h2>FORM UBAH DATA</h2>
    </center>
    <div class="container">
        <div style="margin:20px">
            <a href="indext.php"><button type="button" class="btn btn-primary">Back</button></a>
        </div>
        <?php
        include ("connect.php");
       
        $get_id = $_GET['id'];//id_anggota berasal dari alamat url button edit di indext.php
        $nama_anggota = mysqli_query($koneksi,"select * from anggota where id_anggota='$get_id'");

        while( $tampil=mysqli_fetch_array($nama_anggota)){
                   
                    $nama= $tampil["nama"];
                    $alamat= $tampil["alamat"];
                    $sex= $tampil["sex"];
        
        }
    ?>
            <div class="row">
                <div class=col-md-12>
                    <form action='edit.php? id=<?php echo $get_id ?>' method=post name=form_edit>
                        <table width=100% cellpadding=10 class=table-bordered border=0>
                            <tr>
                                <td>ID : </td>
                                <td> <input type="text" class="form-control" name = id value=<?php echo $get_id?>></input></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Nama : </td>
                                <td> <input type="text" class="form-control" name = nama value=<?php echo $nama?>></input></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td> <input type="text" class="form-control" name = alamat value=<?php echo $alamat?>></input></td>
                            </tr> 
                            <tr>
                                <td></td>
                                <td><button type="submit" class="form-control btn btn-primary" name="finish"  onclick="myFunction()"> Finish</button></td>
                            </tr> 
                        </table>
                    </form>
                    
                </div>
            </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['finish'])){
        mysqli_query($koneksi, "insert into anggota set
        
        nama = '$_POST[nama]',
        alamat = '$_POST[alamat]'");
        $result= mysqli_query($koneksi,"update anggota set  nama=$nama, alamat=$alamat where id_anggota=$get_id");
        ?>

        <script>
            function myFunction() {
            alert("Perubahan data Berhasil!!");
            }
        </script>
        <?php
    }else{
        echo("gagal");
    }
 ?>