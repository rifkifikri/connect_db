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
    <title>Add_Book</title>
</head>
<body>
<div class="container">
        <center>
        <h2>Form Penambahan Buku</h2>
        <br/><br/>
        </center>
        <?php
     include("connect.php");
     $array_penerbit = mysqli_query($koneksi, "select * from penerbit");
     $array_pengarang = mysqli_query($koneksi, "select * from pengarang");
    ?>
    <div class="row">
        <div class=col-md-12>
            <form action="new_book.php" method=post name=form1>
                    <table width=100% cellpadding=10 class=table-bordered border=0>
                        <tr>
                            <td>ISBN</td>
                            <td><input type="text" class="form-control" name=isbn></td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td><input type="text" class="form-control" name=judul></td>
                        </tr>
                        <tr>
                            <td>Tahun</td>
                            <td><input type="text" class="form-control" name=tahun></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td><select class="form-control" name="id_penerbit">
                                <?php
                               while($penerbit=mysqli_fetch_array($array_penerbit)){
                                 echo"
                                 <option value=".$penerbit['id_penerbit'].">".$penerbit[nama_penerbit]."</option>
                                 ";
                               }?>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Pengarang</td>
                            <td>
                                <select class="form-control" name="id_pengarang">
                                    <?php
                                    while($pengarang=mysqli_fetch_array( $array_pengarang)){
                                        echo("<option value=".$pengarang['id_pengarang'].">".$pengarang[nama_pengarang]."</option>");
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" class="form-control btn btn-primary" name=submit value="Add" onclick="myFunction()"></td>
                        </tr>
                    </table>
            </form>

        </div>

    </div>
    <div class="row" style="margin-top:10px">
        <div clas=col-md-3>
            <a href="indext.php" class="btn btn-primary">back</a>
        </div>
    </div>
        
</body>
</html>
<?php
    if(isset($_POST['submit'])){
        mysqli_query($koneksi, "insert into buku set
        isbn = '$_POST[isbn]',
        judul = '$_POST[judul]',
        tahun = '$_POST[tahun]',
        id_penerbit = '$_POST[id_penerbit]',
        id_pengarang  = '$_POST[id_pengarang]'");
        ?>
        <script>
            function myFunction() {
            alert("Penambahan Buku Berhasil!!");
            }
        </script>
        <?php
    }else{
        echo("gagal");
    }
 ?>