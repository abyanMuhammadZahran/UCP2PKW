<?php

include('config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>PT SAWIT BAHAGIA SYSTEM MANAGING| 20170140022</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">AbyanZahran</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
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
        <h2>Daftar Buku</h2>

        <hr>

        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="">
                <tr>
                    <th>NO.</th>
                    <th>NamaBuku</th>
                    <th>kategoriBuku</th>
                    <th>Penerbit</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $sql = mysqli_query($koneksi, "SELECT * FROM tokobuku ORDER BY id DESC") or die(mysqli_error($koneksi));

                if (mysqli_num_rows($sql) > 0) {

                    $no = 1;

                    while ($data = mysqli_fetch_assoc($sql)) {

                        echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['NamaBuku'] . '</td>
							<td>' . $data['KategoriBuku'] . '</td>
							<td>' . $data['Penerbit'] . '</td>
							<td>' . $data['Harga'] . '</td>
							<td>
								<a href="edit.php?id=' . $data['id'] . '" class="badge badge-warning">Edit</a>
								<a href="delete.php?id=' . $data['id'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
                        $no++;
                    }
                } else {
                    echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            <tbody>
        </table>

    </div>
    <!-- ABYANMUHAMMADZAHRAN -->
    <!-- 20170140022 -->
    <!-- Pengembangan Konten Web -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>