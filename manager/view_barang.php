        <div class="box-header with-border" style="border-bottom:1px solid #E6E4E4;padding-left:15px;background:#F5F4FD">
            <h1 class="box-title" style="font-size:150%;">Data Barang</h1>
        </div>
        <!-- Main content -->
        <section class="content">
          <div class="row">
                  <a href="?menu=input-barang" style="color:#595757;float:right;">
                  <div class="tab-pane" id="glyphicons">
                    <ul class="bs-glyphicons">
                      <li>
                        <span class="glyphicon glyphicon-edit"></span>
                        <span class="glyphicon-class">Tambah</span>
                      </li>
                    </ul>
                  </div><!-- /#ion-icons -->
                  </a>
                  <?php// if (!$note==NULL) {
                  ?><!--<div class="alert alert-info alert-dismissable" style="float:right;width:30%;margin:2px -30px 0 0;padding:0 30px 0 0;overflow:hidden">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true" style="position:relative;padding-top:7px;font-size:25px">&times;</button>
                      <h4 style="padding:7px 0 0 10px"><i class="icon fa fa-info"></i><?php//  echo $note;?></h4>
                    </div>--><?php
                //  }?>
                  <div style="width:28%;margin:5px 15px 0 5px ;padding:0 30px 0 0;overflow:hidden">
                    <font size="4px" style="float:left;padding:10px;"></font>
                  </div>
            <div class="col-xs-12">
              <div class="box box-primary">
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped" style="font-size:100%">
                    <thead>
                      <tr>
                        <th width="2%">No</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
                        <th>Isi LS</th>
                        <th>Harga Lusin</th>
                        <th>Harga Biji</th>
                        <th>Stok Barang</th>
                        <th width="15%">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                      include '../config/koneksi.php';
                      $sql1=mysql_query("select * from barang where stts='1'");
                      while ($bc1=mysql_fetch_array($sql1)){
                        $sql2 = mysql_query("SELECT * FROM jenis_barang WHERE kd_jenisbrg='$bc1[jns_barang]'");
                        $bc2  = mysql_fetch_array($sql2);
                        $harga_ls   = number_format($bc1['harga_ls'],0,".",".");
                        $harga_biji = number_format($bc1['harga_biji'],0,".",".");
                      ?><tr>
                          <td align="center"><?php echo $no; $no++;;?></td>
                          <td><?php  echo $bc1['nm_barang']; ?></td>
                          <td><?php  echo $bc2['jns_barang']; ?></td>
                          <td><?php  echo $bc1['isi_ls']; ?>
                          </td>
                          <td>Rp. <?php  echo $harga_ls; ?></td>
                          <td>Rp. <?php  echo $harga_biji; ?></td>
                          <td><?php  echo $bc1['stok_carton']; ?> Carton <?php  echo $bc1['stok_pcs']; ?> Pcs</td>

                          <td align="center">
                              <a class="action" href="?menu=edit-barang&kd=<?php echo $bc1['kd_barang']; ?>" style="padding:2.3px 4px 2.3px 8px;" >
                                <i class="fa fa-edit" style="color:green;"> </i>Ubah
                              </a>
                              <a class="action" href="hapus_barang.php?kd=<?php echo $bc1['kd_barang'];?>" style="padding:2.3px 4px 2.3px 8px;" >
                                <i class="fa fa-close" style="color:red"> </i>Hapus
                              </a>
                          </td>
                        </tr>
                      <?php
                    }
                    ?>
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
