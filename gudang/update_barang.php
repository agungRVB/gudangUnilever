<?php
     include '../config/koneksi.php';
     $sql = mysql_query("SELECT * FROM barang WHERE kd_barang='$_GET[kd]'");
     $bc  = mysql_fetch_array($sql);

 ?>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
  <h1 class="box-title" style="font-size:150%;">Data Barang</h1>
</div>
<section class="content-header">
  <font size="4px">Edit Data Barang</font>
</section>
<section class="content">
 <div class="box box-primary" style="width:100%;margin:0 auto;">
	<div class="box-body"  style="width:99.5%">
	  <table style="width:100%;line-height:40px;position:relative;top:-15px">
      <!--<tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Tanggal Surat</label></td><td>:</td>
          <td><div class="input-group">
            <div class="input-group-addon">
              <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="tgl_surat" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
          </div></td>
          </div>
      </tr>-->
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Nama Barang</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['nm_barang'];?>" name="nm_barang" placeholder="" required></td>
          </div>
      </tr>
      <tr>
        <div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Jenis Barang</label></td><td>:</td>
          <td><div>
              <select name="jns_barang"  class="form-control select2" required style="width:100%;">
                <?php
                    $sql2 = mysql_query("SELECT * FROM jenis_barang WHERE kd_jenisbrg='$bc[jns_barang]'");
                    $bc2  = mysql_fetch_row($sql2);
                 ?>
                  <option value="<?php echo $bc2['0'];?>"><?php echo $bc2['1'];?></option>
              <?php
                  include '../config/koneksi.php';
                  $sql1=mysql_query("SELECT * FROM jenis_barang");
                  while($bc1=mysql_fetch_row($sql1)){
              ?>
                <option value="<?php echo $bc1['0']?>">
                     <?php echo $bc1['1'];?>
                </option>
              <?php
                }
              ?>
              </select>
              <input type="hidden" name="id_server" value="<?php echo $server_items['id']?>">
              </div>
          </td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Isi LS</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['isi_ls'];?>" name="isi_ls" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Harga Lusin</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['harga_ls'];?>" name="harga_ls" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Harga Biji</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['harga_biji'];?>" name="harga_biji" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Stok Carton</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['stok_carton'];?>" name="stok_carton" placeholder="" required></td>
          </div>
      </tr>
      <tr><div class="form-group">
          <td style="font-size:90%"><label for="exampleInputEmail1">Stok PCS</label></td><td>:</td>
          <td><input type="text" class="form-control" value="<?php echo $bc['stok_pcs'];?>" name="stok_pcs" placeholder="" required></td>
          </div>
      </tr>
      <tr>
        <td></td>
        <td colspan="2"><div class="box-footer">
              <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp Save</button> &nbsp
              <button type="reset" class="btn btn-primary" style="background:#713A3A">Reset</button> &nbsp
              <input type="button" class="btn btn-primary" style="color:white;font-weight:bold;background:#6B6B6B" value="Back" onclick="history.back(-1)" >
            </div>
        </td>
      </tr>
    </table>
    </div>
  </div>
</section>
</form>
<?php
@$nm_barang  = $_POST['nm_barang'];
@$jns_barang = $_POST['jns_barang'];
@$isi_ls = $_POST['isi_ls'];
@$harga_ls = $_POST['harga_ls'];
@$harga_biji = $_POST['harga_biji'];
@$stok_carton = $_POST['stok_carton'];
@$stok_pcs = $_POST['stok_pcs'];
if (isset($_POST['submit'])) {
  include '../config/koneksi.php';

       mysql_query("UPDATE barang SET nm_barang='$nm_barang', jns_barang='$jns_barang', isi_ls='$isi_ls',
                    harga_ls='$harga_ls', harga_biji='$harga_biji', stok_carton='$stok_carton', stok_pcs='$stok_pcs'
                    WHERE kd_barang='$_GET[kd]'");
}
 ?>
