<?php
include'koneksi.php';
  if (isset($_POST['login'])) {
    $nama_user  = @$_POST['nama_user'];
    $pswd       = @$_POST['pass'];
    $enkrip     = sha1($pswd);

    $sql  = mysql_query("SELECT * FROM user WHERE namauser='$nama_user' and sandi='$pswd'");
    $row  = mysql_fetch_row($sql);

      if($row > 0){
        session_start();
        $_SESSION['isLoggedIn']=1;
        $_SESSION['username']=$nama_user;
            if ($row['3']==1) {
              header('Location:../admin/');
            }elseif ($row['3']==2) {
              header('Location:../gudang/');
            }elseif ($row['3']==3) {
              header('Location:../manager/');
            }
      }else {
        header('location:../');
      }
    //echo "$enkrip";
  }
 ?>
