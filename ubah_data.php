<?php
    include('connect.php');

    $nim =$_GET['nbi'];
    $getData = mysqli_query($koneksi,"select * from tb_identitas inner join tb_fakultas on tb_identitas.jurusan = tb_fakultas.id
                                    inner join tb_prodi on tb_identitas.prodi = tb_prodi.id where nbi='$nim'");

    $data = mysqli_fetch_array($getData);
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
    <title>tambah_data</title>
</head>
<body>
    <div class="container mt-5">
        <div class="w-50 mx-auto border p-3">
            <form action="" method="post">
            <fieldset>
                <legend>Tambah Data Diri Anda</legend>
                <div class="mb-3">
                    <label for="TextInput" class="form-label">NBI :</label>
                    <input type="text" id="nbi" name="nbi" value="<?php echo"$data[nbi]"?>" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="TextInput" class="form-label">Nama :</label>
                    <input type="text" id="nama" name="nama" value="<?php echo "$data[nama]"?>" class="form-control" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="<?php echo"$data[jenis_kelamin]"?>" checked>
                    <label class="form-check-label" for="laki">
                        Laki-laki
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="<?php echo"$data[jenis_kelamin]"?>" >
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
                <div class="mb-3">
                    <label for="TextInput" class="form-label">Alamat :</label>
                    <input type="text" id="alamat" name="alamat" value="<?php echo"$data[alamat]"?>" class="form-control" required placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <select id="fakultas" name="fakultas" class="form-select">
                        <option> <?php echo"$data[nama_fakultas]"?></option>
                        <option value="1">Teknik</option>
                        <option value="2">Ekonomi</option>
                        <option value="3">Hukum</option>
                        <option value="4">Sastra</option>
                </select>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select id="prodi" name="prodi"value="<?php echo"$data[prodi]"?>" class="form-select">
                        <option><?php echo"$data[nama_prodi]"?></option>
                        <option value="1">Teknik Informatika</option>
                        <option value="2">Teknik Mesin</option>
                        <option value="3">Teknik Elektro</option>
                        <option value="4">Teknik Industri</option>
                        <option value="5">Ilmu Hukum</option>
                        <option value="6">Ilmu Ekonomi</option>
                    </select>
                </div>
               
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <a href="index.php">Kembali</a>
            </fieldset>
            </form>
        </div>
    </div>
</body>
</html>
<?php
    if(isset($_POST['submit'])){// post data ke database
        $nbi = $_POST['nbi'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $alamat = $_POST['alamat'];
        $fakultas = $_POST['fakultas'];
        $prodi = $_POST['prodi'];

        $sqlGet = "select * from tb_identitas where nbi='$nbi'";
        $queryGet = mysqli_query($koneksi,$sqlGet);
        $cek = mysqli_num_rows($queryGet);

        $updateData = "UPDATE tb_identitas set nbi='$nbi', nama='$nama',jenis_kelamin='$jenis_kelamin',jurusan='$fakultas',alamat='$alamat',prodi='$prodi' where  nbi='$nim'";
        $back = "index.php";
        $queryUpdate = mysqli_query($koneksi,$updateData);
        header("location:index.php");
       
    }
    
   ?>