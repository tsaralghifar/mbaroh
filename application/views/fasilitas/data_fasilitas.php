<section class="content-header">
  <h1>
    Inventaris
    <small>Data Inventaris</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> </a></li>
    <li class="active">Inventaris</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <?php $this->view('messages') ?>

  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Inventaris</h3>
      <div class="pull-right">
        <a href="<?= site_url('fasilitas/add') ?>" class="btn btn-primary btn-flat">
          <i class="fa fa-plus"></i>Create
        </a>
        <!-- modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printModal">Barang Masuk</button>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printKeluar">Barang Keluar</button>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="printLabel">Add Unit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
                  <form action="<?= base_url('fasilitas/add_unit'); ?>" method="post">
              <div class="modal-body">
                  <div class="form-group row">
                      <label class="col-sm-3">Barang</label>
                      <div class="col-sm-9">
                        <select class="form-control select-produk" id="barang_stok" name="barang_stok" required>
                                  <option value="">-- Pilih Barang --</option>
                              <?php foreach ($row as $brg) : ?>
                                  <option value="<?= $brg->id; ?>"><?= $brg->nama_barang; ?></option>
                              <?php endforeach; ?>
                        </select>
                      <input type="hidden" name="brg_id" id="brg_id">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3">Jumlah</label>
                      <div class="col-sm-9">
                          <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit">
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
                  </form>
              </div>
          </div>
          </div>
          <div class="modal fade" id="printKeluar" tabindex="-1" role="dialog" aria-labelledby="printKeluar" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printLabel">Barang Keluar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('fasilitas/barang_keluar'); ?>" method="post">
                <div class="modal-body">
                  <div class="form-group row">
                      <label class="col-sm-3">Barang</label>
                      <div class="col-sm-9">
                        <select class="form-control select-produk" id="barang_stok" name="barang_stok" required>
                                  <option value="">-- Pilih Barang --</option>
                              <?php foreach ($row as $brg) : ?>
                                  <option value="<?= $brg->id; ?>"><?= $brg->nama_barang; ?></option>
                              <?php endforeach; ?>
                        </select>
                      <input type="hidden" name="brg_id" id="brg_id">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3">Jumlah</label>
                      <div class="col-sm-9">
                          <input type="number" class="form-control" id="jumlah_unit" name="jumlah_unit">
                      </div>
                  </div>
                  <div class="form-group row">
                      <label class="col-sm-3">Keterangan</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" id="keterangan" name="keterangan">
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
                </form>
              </div>
          </div>
          </div>
        <!-- end modal -->
      </div>
    

    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Tipe</th>
            <th>Status</th>
            <th>Unit</th>
            <th>Foto</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row as $key => $data) { ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $data->nama_barang ?></td>
              <td><?= $data->nama_kategori ?></td>
              <td><?= $data->status ?></td>
              <td><?= $data->unit ?></td>
              <td><img src="<?= base_url('uploads/fasilitas/') . $data->foto_barang; ?> " alt="" height="80"></td>
              <td class="text-center" width="160px">
                <?php if($data->foto_barang != null) { ?>
                <a href="<?= site_url('fasilitas/edit/' . $data->id) ?>" class="btn btn-primary btn-xs">
                <?php } ?>
                  <i class="fa fa-pencil"></i>Edit
                </a>
                <a href="<?= site_url('fasilitas/del/' . $data->id) ?>" onclick="return confirm('Ingin Menghapus Data Ini?')" class="btn btn-danger btn-xs">
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