<section class="content-header">
  <h1>
    Menu
    <small>Data Menu</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
    <li class="active">Menu</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <?php $this->view('messages') ?>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data menu</h3>
      <div class="pull-right">
        <a href="<?= site_url('menu/add') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-plus"></i>Create
        </a>
        <a href="<?= site_url('menu/print') ?>" class="btn btn-success btn-flat">
          <i class="fa fa-print"></i>Print
        </a>
      </div>  
    </div>

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Keterangan</th>
            <th>Gambar</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row as $key => $data) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->nama_menu ?></td>
              <td><?= $data->kategori_menu == 1 ? "Makanan" : "Minuman" ?></td>
              <td><?= $data->harga ?></td>
              <td><?= $data->ket == 1 ? "Ada" : "Ksong" ?></td>
              <td><img src="<?= base_url('uploads/menu/') . $data->gambar; ?> " alt="" height="80"></td>
              <td class="text-center" width="160px">
                <?php if($data->gambar != null) { ?>
                <a href="<?= site_url('menu/edit/' . $data->menu_id) ?>" class="btn btn-primary btn-xs">
                <?php } ?>
                  <i class="fa fa-pencil"></i>Edit
                </a>
                <a href="<?= site_url('menu/del/' . $data->menu_id) ?>" onclick="return confirm('Ingin Menghapus Data Ini?')" class="btn btn-danger btn-xs">
                  <i class="fa fa-trash"></i>Hapus
                </a>
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