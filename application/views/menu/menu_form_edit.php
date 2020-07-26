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

  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= ucfirst($page) ?> Menu</h3>
      <div class="pull-right">
        <a href="<?= site_url('menu') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i>Back
        </a>
      </div>
    </div>

    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
        <?= $this->session->flashdata('message');?>
          <?php echo form_open_multipart('menu/edit/' . $row->menu_id); ?>
          <div class="form-group">
            <label>Nama Menu</label>
            <input type="hidden" name="id">
            <input type="text" name="nama_menu" class="form-control" required value="<?= $row->nama_menu; ?>">
          </div>
          <div class="form-group">
            <label>Kategori Menu</label>
            <select name="kategori_menu" class="form-control" required>
              <option value="">-Pilih-</option>
              <option value="1" <?= $row->kategori_menu == "1" ? 'selected' : '' ?>>-Makanan-</option>
              <option value="2" <?= $row->kategori_menu == "2" ? 'selected' : '' ?>>-Minuman-</option>
            </select>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control" required value="<?= $row->harga; ?>">
          </div>
          <div class="form-group">
            <label>Gambar</label>
                <div>
                  <img src="<?= base_url('uploads/menu/' . $row->gambar) ?>" style="width:80px">
                </div>
            <input type="file" name="gambar" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-success btn-flat">
              <i class="fa fa-paper-plane"></i>Save
            </button>
            <button type="reset" class="btn btn-flat">Reset</button>
          </div>
          <?php echo form_close(); ?>
        </div>
      </div>
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