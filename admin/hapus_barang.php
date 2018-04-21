<?php
include '../config/koneksi.php';
    mysql_query("UPDATE barang SET stts='0' WHERE kd_barang='$_GET[kd]'");
    header('location:index.php?menu=barang');
 ?>
