<?php
    include('connect.php');

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
                    <input type="text" id="nbi" name="nbi" class="form-control" placeholder="Masukkan Nbi" required>
                </div>
                <div class="mb-3">
                    <label for="TextInput" class="form-label">Nama :</label>
                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki" value="1" checked>
                    <label class="form-check-label" for="laki">
                        Laki-laki
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="2" >
                    <label class="form-check-label" for="perempuan">
                        Perempuan
                    </label>
                </div>
                <div class="mb-3">
                    <label for="TextInput" class="form-label">Alamat :</label>
                    <input type="text" id="alamat" name="alamat"  class="form-control" required placeholder="Masukkan Nama">
                </div>
                <div class="mb-3">
                    <label for="fakultas" class="form-label">Fakultas</label>
                    <select id="fakultas" name="fakultas" class="form-select">
                        <option>---Fakultas---</option>
                        <option value="1">Teknik</option>
                        <option value="2">Ekonomi</option>
                        <option value="3">Hukum</option>
                        <option value="4">Sastra</option>
                </select>
                </div>
                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select id="prodi" name="prodi" class="form-select">
                        <option>---Prodi---</option>
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

        $insertData = "insert into tb_identitas(nbi,nama,jenis_kelamin,jurusan,alamat,prodi)  values ('$nbi','$nama','$jenis_kelamin','$fakultas','$alamat','$prodi')";
        $back = "index.php";
        $queryInsert = mysqli_query($koneksi,$insertData);
        if(isset($insertData)&&$cek <= 0){
            echo"
            <div class='alert alert-success mb-5'>data Berhasil ditambahkan <a href='index.php'> Lihat tambah data</a></div>";// untuk pindah halaman ketika sudah selesai tambah data
        }else if($cek >=1){
            echo"
            <div class='alert alert-danger'>data gagal ditambahkan <a href='tambah.php'> kembali tambah data</a></div>";
        }
       
    }
    
   ?>