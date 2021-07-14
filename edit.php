<?php include('config.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>PT SAWIT BAHAGIA SYSTEM MANAGING| 20170140022</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">AbyanZahran</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top:20px">
        <h2>Edit Buku</h2>

        <hr>

        <?php

        if (isset($_GET['id'])) {

            $id = $_GET['id'];


            $select = mysqli_query($koneksi, "SELECT * FROM tokobuku WHERE id='$id'") or die(mysqli_error($koneksi));


            if (mysqli_num_rows($select) == 0) {
                echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
                exit();
            } else {

                $data = mysqli_fetch_assoc($select);
            }
        }
        ?>

        <?php

        if (isset($_POST['submit'])) {
            $NamaBuku            = $_POST['NamaBuku'];
            $KategoriBuku            = $_POST['KategoriBuku'];
            $Penerbit    = $_POST['Penerbit'];
            $Harga        = $_POST['Harga'];

            $sql = mysqli_query($koneksi, "UPDATE tokobuku SET KategoriBuku='$KategoriBuku', Penerbit='$Penerbit', Harga='$Harga' WHERE id='$id'") or die(mysqli_error($koneksi));

            if ($sql) {
                echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id=' . $id . '";</script>';
            } else {
                echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
            }
        }
        ?>

        <form action="edit.php?id=<?php echo $id; ?>" method="post">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">NamaBuku</label>
                <div class="col-sm-10">
                    <input type="text" name="NamaBuku" class="form-control" size="4" value="<?php echo $data['NamaBuku']; ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">KategoriBuku</label>
                <div class="col-sm-10">
                    <input type="text" name="KategoriBuku" class="form-control" value="<?php echo $data['KategoriBuku']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Penerbit</label>
                <div class="col-sm-10">
                    <input type="text" name="Penerbit" class="form-control" value="<?php echo $data['Penerbit']; ?>" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" name="Harga" class="form-control" value="<?php echo $data['Harga']; ?>" required>
                </div>
            </div>


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">&nbsp;</label>
                <div class="col-sm-10">
                    <input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
                    <a href="index.php" class="btn btn-warning">KEMBALI</a>
                </div>
            </div>
        </form>

    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>