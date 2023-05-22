<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD and Upload Images with PHP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light px-5 shadow">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"> <img src="./assets/logo.png" alt="" width="50px" height="50px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form-simpan.php">Tambah Siswa</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="px-5 mx-5 my-4">
    <h1>Data Siswa</h1>
    <a href="form-simpan.php" class="text-black">
      Tambah Data
    </a>

    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
          <th class="text-center">Foto</th>
          <th class="text-center">NIS</th>
          <th class="text-center">Nama</th>
          <th class="text-center">Jenis Kelamin</th>
          <th class="text-center">Telepon</th>
          <th class="text-center">Alamat</th>
          <th class="text-center" colspan="2">Edit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        include "config.php";
        $sql = $pdo->prepare("SELECT * FROM siswa");
        $sql->execute();
        while ($data = $sql->fetch()) {
          echo "<tr>";
          echo "<td class='text-center'><img src='images/" . $data['foto'] . "' width='100' height='100'></td>";
          echo "<td class='text-center'>" . $data['nis'] . "</td>";
          echo "<td class='text-center'>" . $data['nama'] . "</td>";
          echo "<td class='text-center'>" . $data['jenis_kelamin'] . "</td>";
          echo "<td class='text-center'>" . $data['telp'] . "</td>";
          echo "<td class='text-center'>" . $data['alamat'] . "</td>";
          echo "<td class='text-center'><a href='form_ubah.php?id=" . $data['id'] . "' class='btn btn-primary'>Ubah</a></td>";
          echo "<td class='text-center'><a href='proses_hapus.php?id=" . $data['id'] . "' class='btn btn-danger'>Hapus</a></td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>