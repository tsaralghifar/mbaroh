<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Data Penjualan
        <small>Rekap Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Rekap Transaksi</li>
        <li class="active">Penjualan</li>
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
                            <form action="<?= base_url('laporan/generate_reservasi'); ?>" method="post">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-paste"></i> Buat Laporan</button>
                            </form>
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
                            <?php foreach ($reservasi as $pj) : ?>
                                <tr>
                                    <td><?= $pj->no_doc; ?></td>
                                    <td><?= $pj->created_at; ?></td>
                                    <td><?= $pj->created_by; ?></td>
                                    <td>
                                        <div class="text-center" width="160px">
                                            <form action="<?= base_url('laporan/reservasi_print/'); ?>" method="post">
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


