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

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pendapatan</h3>
      <div class="pull-right">
        <a href="<?= site_url('laporan/print_pendapatan') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-print"></i>Print
        </a>
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
  <!-- </div> -->
  <!-- /.box -->

</section>