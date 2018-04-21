<?php
session_start();
include"../config/koneksi.php";
if (empty($_SESSION['username'])) {
      header('location:../');
}else{
include_once 'header.php';
    switch (@$_GET['menu']) {
        case 'barang':
          include 'view_barang.php';
          break;
        case 'input-barang':
          include 'create_barang.php';
          break;
        case 'edit-barang':
          include 'update_barang.php';
          break;
        case 'barang-masuk':
          include 'view_barang_masuk.php';
          break;
        case 'input-barang-masuk':
          include 'create_barang_masuk.php';
          break;
        case 'barang-keluar':
          include 'view_barang_keluar.php';
          break;
        case 'input-barang-keluar':
          include 'create_barang_keluar.php';
          break;
        case 'user':
          include 'view_user.php';
          break;
        case 'input-user':
          include 'create_user.php';
          break;
        case 'edit-user':
          include 'update_user.php';
          break;
        case 'laporan':
          include 'laporan.php';
          break;
        case 'laporan-barang':
          include 'laporan_barang.php';
          break;
        case 'laporan-barang-masuk':
          include 'laporan_barang_masuk.php';
          break;
        case 'laporan-barang-keluar':
          include 'laporan_barang_keluar.php';
          break;
      default:
      echo "<br>";
      break;
    }
include_once 'footer.php';
}
 ?>
