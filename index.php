<?php
    include ('connect.php');
    // $id = $_GET('id');
    $no=1;
    $identitas = mysqli_query($koneksi,"select * from tb_identitas inner join tb_fakultas on tb_identitas.jurusan = tb_fakultas.id
                                            inner join tb_prodi on tb_identitas.prodi = tb_prodi.id
                                            inner join tb_sex on tb_identitas.jenis_kelamin = tb_sex.id order by tb_identitas.id asc");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Lobster&family=Montserrat&family=Open+Sans:wght@300&family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>data diri</title>
</head>
<body>
    <div class="container">
        <div class="p-3 mb-2 bg-light text-white">
            <div class="row">
                <div class="col-10">
                    <a href="tambah.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
                </div>
                <div class="col">
                    <a href="welcome.php"><button type="button" class="btn btn-outline-danger">Log Out</button></a>
                </div>
            </div>
        </div>
        <table class="table table-hover table-bordered mt-5">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">NBI</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Alamat</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Program Studi</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
          
            <?php
                while($data =mysqli_fetch_array($identitas)){
                   
                    echo "
                        <tr>
                        <th scope='row'> $no</th>
                        <td>$data[nbi]</td>
                        <td> $data[nama]</td>
                        <td> $data[jenis_kelamin]</td>
                        <td> $data[alamat]</td>
                        <td> $data[nama_fakultas]</td>
                        <td> $data[nama_prodi]</td>
                        <td>
                            <div class='row '>
                                <div class='col d-flex justify-content-center'>
                                    <a href='ubah_data.php? nbi=$data[nbi]'><button type='button' class='btn btn-warning'>UPDATE</button></a>
                                </div>
                                <div class='col d-flex justify-content-center'>
                                    <a href='delete.php? nbi=$data[nbi]'><button type='button' class='btn btn-danger'>DELETE</button></a>
                                    
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                    ";
                    
                    $no++;
                }
            ?>
        </tbody>
        </table>
    </div>
</body>
</html>