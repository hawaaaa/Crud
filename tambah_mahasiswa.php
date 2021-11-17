<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
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
        <h1>Tambah Data Mahasiswa</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>NIM :</label>
          <input type="text" name="nim" autofocus="" required="" />
        </div>
        <div>
          <label>Nama Mahasiswa :</label>
          <input type="text" name="namamhs" required="" />
        </div>
        <div>
          <label>Jenis Kelamin :</label>
          <input type = "radio" name="jk" value="laki-laki">Laki-Laki
          <input type = "radio" name="jk" value="perempuan">Perempuan
        </div>
        <div>
          <label>Alamat :</label>
          <input type="text" name="alamat" required="" />
        </div>
        <div>
          <label>Kota :</label>
          <input type="text" name="kota" required="" />
        </div>
        <div>
          <label>Email :</label>
          <input type="text" name="email" required="" />
        </div>
        <div>
          <label>Foto :</label>
          <input type="file" name="foto" required="" />
        </div>
        <div>
         <button type="submit">Simpan Data Mahasiswa</button>
        </div>
        </section>
      </form>
  </body>
</html>