<div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
    <h1 class="box-title" style="font-size:150%;">Laporan Barang Keluar</h1>
</div>
<!-- Main content -->
<section class="content">
  <div class="row">
          <!--<a href="?menu=input-masuk" style="color:#595757;float:right;">
          <div class="tab-pane" id="glyphicons">
            <ul class="bs-glyphicons">
              <li>
                <span class="glyphicon glyphicon-edit"></span>
                <span class="glyphicon-class">Tambah</span>
              </li>
            </ul>
          </div> /#ion-icons
        </a>-->
        <form class="" action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
        <table style="margin-left:700px;">
          <tr>
            <td>
              <label>Bulan</label>
              <select name="bulan" style="width:100;">
                <?php
                for ($i=1; $i < 13; $i++) {
                  if ($i==1) {
                    echo"<option value=$i>Januari</option>";
                  }elseif ($i==2) {
                    echo"<option value=$i>Februari</option>";
                  }elseif ($i==3) {
                    echo"<option value=$i>Maret</option>";
                  }elseif ($i==4) {
                    echo"<option value=$i>April</option>";
                  }elseif ($i==5) {
                    echo"<option value=$i>Mei</option>";
                  }elseif ($i==6) {
                    echo"<option value=$i>Juni</option>";
                  }elseif ($i==7) {
                    echo"<option value=$i>Juli</option>";
                  }elseif ($i==8) {
                    echo"<option value=$i>Agustus</option>";
                  }elseif ($i==9) {
                    echo"<option value=$i>September</option>";
                  }elseif ($i==10) {
                    echo"<option value=$i>Oktober</option>";
                  }elseif ($i==11) {
                    echo"<option value=$i>November</option>";
                  }elseif ($i==12) {
                    echo"<option value=$i>Desember</option>";
                  }

                }
                  ?>
              </select>
            </td>
            <td>
                <label>Tahun</label>
                <select name="tahun" style="width:100;">
                  <?php
                  $date=date('Y');
                  for ($t=$date; $t > 2015; $t--) {
                    echo"<option value=$t>$t</option>";
                  }
                  ?>
                </select>
            </td>
            <td>
              <div class="btn-group-vertical" class="pading-left:20px;">
                <button type="submit" name="lapor" class="btn btn-warning"><i class="fa fa-folder" style="color:white"></i>
              </div>
            </td>
          </tr>
        </table>
      </form>
          <?php// if (!$note==NULL) {
          ?><!--<div class="alert alert-info alert-dismissable" style="float:right;width:30%;margin:2px -30px 0 0;padding:0 30px 0 0;overflow:hidden">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="position:relative;padding-top:7px;font-size:25px">&times;</button>
              <h4 style="padding:7px 0 0 10px"><i class="icon fa fa-info"></i><?php//  echo $note;?></h4>
            </div>--><?php
        //  }?>
        <!--  <div style="width:28%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden">
            <font size="4px" style="float:left;padding:10px;">Data Surat Masuk</font>
          </div>-->
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
            <thead>
              <tr>
                <th width="2%">No</th>
                <th>Nama Barang</th>
                <th>Tanggal Transaksi</th>
                <th>Stok Barang</th>
              </tr>
            </thead>
            <tbody>
            <?php
            if (isset($_POST['lapor'])) {
            $no=1;
              include '../config/koneksi.php';
              $tgl=$_POST['bulan']."-".$_POST['tahun'];
              $sql1=mysql_query("select * from transaksi where jns_transaksi='2' and tgl_transaksi like '%$tgl%'");
              while ($bc1=mysql_fetch_array($sql1)){
              $sql2 = mysql_query("SELECT * FROM barang WHERE kd_barang='$bc1[kd_barang]'");
              $bc2  = mysql_fetch_array($sql2);
              ?><tr>
                  <td align="center"><?php echo $no; $no++;;?></td>
                  <td><?php echo $bc2['nm_barang']; ?></td>
                  <td><?php echo $bc1['tgl_transaksi']; ?></td>
                  <td><?php echo $bc1['carton']; ?> Carton <?php echo $bc1['pcs']; ?> PCS</td>
                </tr>
              <?php
            }
          }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!-- /.col -->
  </div><!-- /.row -->
</section><!-- /.content -->
