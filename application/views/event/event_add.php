<section class="content-header">
  <h1>
    Event
    <small>Data Event</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
    <li class="active">Event</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?= ucfirst($page) ?> Event</h3>
      <div class="pull-right">
        <a href="<?= site_url('event') ?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i>Back
        </a>
      </div>
    </div>

    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <?php echo form_open_multipart('event/add'); ?>
          <div class="form-group">
            <label>Nama Event</label>
            <input type="hidden" name="id">
            <input type="text" name="nama_event" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Kegiatan</label>
            <input type="text" name="kegiatan" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Foto</label>
                <!-- <div>
                  <img src="<?= base_url('uploads/event/' . $row->foto) ?>" style="width:80px">
                </div> -->
            <input type="file" name="foto" class="form-control">
          </div>
          <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
              <option value="">-Pilih-</option>
              <option value="1">-Finished-</option>
              <option value="2">-Soon-</option>
            </select>
          </div>
          <div class="form-group">
            <label>Tgl Acara</label>
            <input type="date" name="tgl" class="form-control" required>
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