<?php
  include('koneksi.php');
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
    table {
      border: solid 1px #DEB887;
      border-collapse: collapse;
      border-spacing: 0;
      width: 80%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DEB887;
        border: solid 1px #DEB887;
        color: #000000 ;
        font-size: 22px;
        padding: 10px;
        text-align: left;

        text-decoration: none;
    }
    table tbody td {
        border: solid 5px #DEB887 ;
        font-size: 20px;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
    }
    a {
          background-color: salmon;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 20px;
    }
    </style>
  </head>
  <body>
    <center><h1>Data Mahasiswa</h1><center>
    <center><a href="tambah_mahasiswa.php">+ &nbsp; Tambah Data Mahasiswa</a><center>
    <br/>
    <table>
      <thead>
        <tr>
          <th>Id</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Jenis Kelamin</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Email</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      $query = "SELECT * FROM tbl_mhs ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      $no = 1; 
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nim']; ?></td>
          <td><?php echo $row['namamhs']; ?></td>
          <td><?php echo $row['jk']; ?></td>
          <td><?php echo $row['alamat']; ?></td>
          <td><?php echo $row['kota']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td style="text-align: center;"><img src="foto/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
          <td>
              <a href="edit_mahasiswa.php?id=<?php echo $row['id']; ?>">Edit</a> |
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; 
      }
      ?>
    </tbody>
    </table>
  </body>
</html>