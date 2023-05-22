<html>

<head>
  <title>CRUD PHP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">

</head>

<body style="background-color:lightseagreen; background-size: cover; background-repeat: no-repeat; background-position: center center;">
  <div class="container col-6 py-4">
    <div class="bg-white rounded p-4 shadow">
      <h1 class="text-center">Form Ubah Data Siswa</h1>
      <?php
      include "config.php";
      $id = $_GET['id'];
      $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
      $sql->bindParam(':id', $id);
      $sql->execute();
      $data = $sql->fetch();
      ?>
      <form method="post" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
        <table class="table table-borderless">
          <tr>
            <td>NIS</td>
            <td><input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>"></td>
          </tr>
          <tr>
            <td>Nama</td>
            <td><input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>"></td>
          </tr>
          <tr>
            <td>Jenis Kelamin</td>
            <td>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki-laki" value="laki-laki" <?php if ($data['jenis_kelamin'] == "Laki-laki") echo "checked"; ?>>
                <label class="form-check-label" for="laki-laki">Laki-laki</label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="perempuan" <?php if ($data['jenis_kelamin'] == "Perempuan") echo "checked"; ?>>
                <label class="form-check-label" for="perempuan">Perempuan</label>
              </div>
            </td>
          </tr>
          <tr>
            <td>Telepon</td>
            <td><input type="text" name="telp" class="form-control" value="<?php echo $data['telp']; ?>"></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td><textarea name="alamat" class="form-control"><?php echo $data['alamat']; ?></textarea></td>
          </tr>
          <tr>
            <td>Foto</td>
            <td><input type="file" name="foto" class="form-control"></td>
          </tr>
        </table>
        <hr>
        <div class="text-center">
          <input type="submit" value="Ubah" class="btn btn-primary">
          <a href="index.php" class="btn btn-secondary">Batal</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>