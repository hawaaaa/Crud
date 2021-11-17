<?php
include 'koneksi.php';

  $id = $_POST['id'];
  $nim        = $_POST['nim'];
  $namamhs    = $_POST['namamhs'];
  $jk         = $_POST['jk'];
  $alamat     = $_POST['alamat'];
  $kota       = $_POST['kota'];
  $email      = $_POST['email'];
  $foto       = $_FILES['foto']['name'];

  
  if($foto != "") {
    $ekstensi_diperbolehkan = array('png','jpg'); 
    $x = explode('.', $foto); 
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];   
    $angka_acak     = rand(1,999);
    $nama_gambar_baru = $angka_acak.'-'.$foto; 
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                  move_uploaded_file($file_tmp, 'foto/'.$nama_gambar_baru); 
                      
                   $query  = "UPDATE tbl_mhs SET nim = '$nim', namamhs = '$namamhs', jk = '$jk', alamat = '$alamat', kota = '$kota', email = '$email', foto = '$nama_gambar_baru'";
                    $query .= "WHERE id = '$id'";
                    $result = mysqli_query($koneksi, $query);
                    
                    if(!$result){
                        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
                    } else {
                      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
                    }
              } else {     
                  echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='tambah_mahasiswa.php';</script>";
              }
    } else {
      $query  = "UPDATE tbl_mhs SET nim = '$nim', namamhs = '$namamhs', jk = '$jk', alamat = '$alamat', kota = '$kota', email = '$email'";
      $query .= "WHERE id = '$id'";
      $result = mysqli_query($koneksi, $query);
     
      if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                             " - ".mysqli_error($koneksi));
      } else {
      
          echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
    }

 

