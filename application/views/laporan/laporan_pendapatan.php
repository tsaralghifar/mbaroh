<section class="content-header">
  <h1>
    Pendapatan
    <small>Data Menu</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
    <li class="active">Pendapatan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <?php $this->view('messages') ?>

<!-- <<<<<<< HEAD -->
  <div class="row">
    <div class="col-md-12">
      <div class="box box-widget">
        <div class="box-body">
          <form action="" method="post">
            <div class="form-group row">
              <div class="col-md-5">
                <div class="col-sm-12">
                  <label for="tanggal_awal">Tanggal awal</label>
                  <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="<?= set_value('tanggal_awal'); ?>">
                </div>
              </div>
              <div class="col-md-5">
                <div class="col-sm-12">
                  <label for="tanggal_akhir">Tanggal akhir</label>
                  <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="<?= set_value('tanggal_akhir'); ?>">
                </div>
              </div>
              <div class="col-md-2" style="margin-top: 31.5px;">
                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Filter</button>
              </div>
            </div>
          </form>
        </div>
<!-- ======= -->
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pendapatan</h3>
      <div class="pull-right">
        <a href="<?= site_url('laporan/print_pendapatan') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-print"></i>Print
        </a>
<!-- >>>>>>> fb57396fb6b9c107662526e1dbb3c34d55dd8706 -->
      </div>
      <!-- /.card-body -->
      <!-- /.card -->
    </div>
  </div>

        <div class="box-body table-responsive">
          <table class="table table-bordered table-striped" id="table1">
            <thead>
              <tr>
                <th>No</th>
                <th>Faktur</th>
                <th>Tanggal</th>
                <th>Nominal</th>
                <th>Jenis</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($pendapatan as $key => $data) { ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $data->faktur ?></td>
                  <td><?= $data->waktu_transaksi; ?></td>
                  <td><?= $data->total ?></td>
                  <td><?= $data->tipe == 'Penjualan' ? '<span class="label label-warning">Penjualan</span>' : '<span class="label label-success">Reservation</span>' ?></td>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- </div> -->
  <!-- /.box -->

</section>