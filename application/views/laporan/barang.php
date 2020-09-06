<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Data Inventaris
        <small>Rekap Barang</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Rekap Barang</li>
        <li class="active">Inventaris</li>
    </ol>
</section>
    <!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget">
                    <div class="box-body">
                    <form action="" method="post">
                    <h1 class="box-title">Data <?= $title; ?></h1>
                            <div class="form-group row">
                                <div class="col-md-5">
                                    <div class="col-sm-12">
                                        <label for="tgl_awal">Tanggal awal</label>
                                        <input type="date" class="form-control" id="tanggal_awal" name="tgl_awal">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="col-sm-12">
                                        <label for="tgl_akhir">Tanggal akhir</label>
                                        <input type="date" class="form-control" id="tanggal_akhir" name="tgl_akhir">
                                    </div>
                                </div>
                                <div class="col-md-2" style="margin-top: 31.5px;">
                                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-search"></i> Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <!-- /.card-body -->
                <!-- /.card -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <div class="float-left">
                            <h1 class="box-title">Data <?= $title; ?></h1>
                        </div>
                        <div class="pull-right">
                            <form action="<?= base_url('laporan/generate_barang'); ?>" method="post">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paste"></i> Buat Laporan</button>
                            </form>
                        </div>
                        <!-- Button trigger modal -->
                        <div class="pull-left">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printModal">Print</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="printModal" tabindex="-1" role="dialog" aria-labelledby="printLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="printLabel">Print Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                                <form action="<?= base_url('laporan/generate_barang_periode/'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-sm-3">Dari Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tgl_a" name="tgl_a">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3">Ke Tanggal</label>
                                    <div class="col-sm-9">
                                        <input type="date" class="form-control" id="tgl_b" name="tgl_b">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Gen</button>
                            </div>
                                </form>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="table1">
                            <thead>
                                <tr>
                                    <th>No. Dokumen</th>
                                    <th>Dibuat pada</th>
                                    <th>Dibuat oleh</th>
                                    <th>Opt.</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($barang as $pj) : ?>
                                <tr>
                                    <td><?= $pj->no_doc; ?></td>
                                    <td><?= $pj->created_at; ?></td>
                                    <td><?= $pj->created_by; ?></td>
                                    <td>
                                        <div class="text-center" width="160px">
                                            <form action="<?= base_url('laporan/penjualan_print/'); ?>" method="post">
                                                <input type="hidden" value="<?= $pj->id; ?>" name="id">
                                                <input type="hidden" value="pdf" name="tipe">
                                                <button class="btn btn-success btn-sm" type="submit" value="pdf" name="gen"><i class="fa fa-download"></i></button>
                                                <input type="hidden" value="<?= $pj->id; ?>" name="id">
                                                <input type="hidden" value="print" name="tipe">
                                                <button class="btn btn-warning btn-sm" type="submit" value="print" name="gen"><i class="fa fa-print"></i></button>
                                            </form>
                                            &nbsp;
                                            
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<?php if ($this->session->flashdata('sukses-produk')) : ?>
    <div class="sukses-produk" data-suksesproduk="<?= $this->session->flashdata('sukses-produk'); ?>"></div>
<?php endif; ?>
