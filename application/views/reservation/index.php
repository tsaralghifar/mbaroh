<section class="content-header">
  <h1>
    Booking/Reservasi
    <small>Data Booking/Reservasi</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
    <li class="active">Booking/Reservasi</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <?php $this->view('messages') ?>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Booking/Reservasi</h3>
      <div class="pull-right">
      <a href="<?= site_url('reservation/print_res') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-print"></i>Print
        </a>
      </div>
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Phone</th>
            <th>Jumlah Orang</th>
            <th>Status</th>
            <th>Booking Time</th>
            <th>Booking Pada</th>
            <th>Bukti Transfer</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row as $key => $data) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?php xss($data->nama) ?></td>
              <td><?php xss($data->phone) ?></td>
              <td><?= $data->jumlah_orang ?></td>
              <td>
                <p class="btn-success-<?= $data->status_b == 'pending' ? 'danger' : 'success' ?>"><?= $data->status_b; ?></p>
              </td>
              <td><?= date("d m Y h:i a", strtotime($data->booking_at)); ?></td>
              <td><?= $data->tgl_h ?></td>
              <td><?= $data->status_bayar == 1 ? "DP" : "LUNAS" ?></td>
              <td><img src="<?= base_url('uploads/reservation/') . $data->tf; ?> " alt="" height="80"></td>
              <td class="text-center">
                    <a href="<?= site_url('reservation/print/') . $data->id ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-print"></i>Print
                    </a>
                    <?php if ($data->status_b == 'pending') : ?>
                    <a href="<?= site_url('reservation/edit/' . $data->id) ?>" class="btn btn-primary btn-xs">
                    <i class="fa fa-pencil"></i>Edit
                    </a>
                    <a href="<?= base_url('reservation/check/') . $data->id ?>" class="btn btn-warning btn-xs" id="tombol-baru"><i class="fa fa-check">Proses</i></a>
                    <?php endif; ?> 
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Default box -->
  <!-- <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-th"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Items</span>
              <span class="info-box-number">90</span>
            </div>
          </div>
        </div>

          <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-truck"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Suppliers</span>
              <span class="info-box-number">4</span>
            </div>
          </div>
        </div>

        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Costumer</span>
              <span class="info-box-number">60</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-user-plus"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number">4</span>
            </div>
          </div>
        </div>
      </div>
        
        <!-- /.box-body -->

  <!-- /.box-footer-->
  </div> -->
  <!-- /.box -->

</section>