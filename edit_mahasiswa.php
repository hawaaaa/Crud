 <?php
include 'koneksi.php';

  if (isset($_GET['id'])) {
    
    $id = ($_GET["id"]);

    $query = "SELECT * FROM tbl_mhs WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>DATA MAHASISWA</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: black;
      }
    button {
          background-color: salmon;
          color: #fff;
          padding: 20px;
          text-decoration: none;
          font-size: 20px;
          border: 5px;
          margin-top: 20px;
    }
    label {
      margin-top: 9px;
      font-size: 20px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 10px;
      font-size: 20px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 5px solid #ccc;
      outline-color: salmon;
    }
    div {
      width: 100%;
      height: auto;
    }
    .base {
      width: 900px;
      font-size: 20px;
      height: auto;
      padding: 60px;
      margin-left: auto;
      margin-right: auto;
      background: #ededed;
    }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Data Mahasiswa</h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
      <section class="base">
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>NIM :</label>
          <input type="text" name="nim" value="<?php echo $data['nim']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Nama Mahasiswa :</label>
         <input type="text" name="namamhs" value="<?php echo $data['namamhs']; ?>" />
        </div>
        <div>
        <label>Jenis Kelamin :</label>
          <input type = "radio" name="jk" value="laki-laki">Laki-Laki
          <input type = "radio" name="jk" value="perempuan">Perempuan
        </div>
        <div>
          <label>Alamat :</label>
         <input type="text" name="alamat" required=""value="<?php echo $data['alamat']; ?>" />
        </div>
        <div>
          <label>Kota :</label>
         <input type="text" name="kota" required=""value="<?php echo $data['kota']; ?>" />
        </div>
        <div>
          <label>Email :</label>
         <input type="text" name="email" required="" value="<?php echo $data['email']; ?>"/>
        </div>
        <div>
          <label>Foto :</label>
          <img src="foto/<?php echo $data['foto']; ?>" style="width: 100px;float: left;margin-bottom: 3px;">
          <input type="file" name="foto" />
          <i style="float: left;font-size: 17px;color: red">Abaikan jika tidak merubah foto</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>