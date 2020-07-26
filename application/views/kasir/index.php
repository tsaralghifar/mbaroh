<section class="content-header">
    <h1>Kasir
        <small>Penjualan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li>Transaction</li>
        <li class="active">Sales</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align:top">
                                <label for="date">Date</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="date" id="date" value="<?=date('Y-m-d')?>" class="form-control" readonly="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="<?=$this->fungsi->user_login()->nama ?>" class="form-control" readonly="">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:top">
                                <label for="costumer">Costumer</label>
                            </td>
                            <td>
                                <div>
                                    <select id="costumer" class="form-control">
                                        <option value="">Umum</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    <form method="post" action="<?= base_url('kasir/addtocart') ?>">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                <div class="form-group row">
                    <label for="product" class="col-sm-4 col-form-label">Product</label>
                    <div class="col-sm-6">
                        <select name="product" id="product" style="width: 100%; height: 100%">
                             <option value="" selected> -- Choose Product -- </option>
                            <?php foreach ($menu as $key) : ?>
                            <option value="<?= $key->menu_id; ?>"><?= $key->nama_menu; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="product" class="col-sm-4 col-form-label">Qty</label>
                    <div class="col-sm-6 py-2">
                        <input type="number" class="form-control" id="qty" name="qty" required>
                    </div>
                    <div class="col-sm-2 py-2">
                        <button class="btn btn-success" type="submit"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
    </form>
                    <!-- <table width="100%">
                        <tr>
                            <td style="vertical-align:top; width:30%">
                                <label for="">Menu</label>
                            </td>
                            <td>
                                <div class="form-group input-group">
                                    <input type="hidden" id="">
                                    <input type="hidden" id="">
                                    <input type="hidden" id="">
                                    <input type="text" id="" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>
                    </table> -->
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="box box-widget">
                <div class="box-body">
                    <table class="table table-hover table striped">
                        <thead>
                            <tr>
                                <th class="text-center">No.</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Sub Total</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no = 1;
                        foreach ($dataFromCart as $key) : ?>
                            <tr>
                                 <td class="text-center"><?= $no++; ?></td>
                                 <td><?= $key->nama_menu; ?></td>
                                 <td><?= $key->harga; ?></td>
                                 <td><?= $key->qty; ?></td>
                                 <td><?= $key->harga * $key->qty; ?></td>
                                 <td class="text-center">
                                    <a class="btn-sm btn-danger tombol-cart" href="<?= base_url('kasir/hapus/') . $key->menu_id; ?>"><i class="fa fa-trash"></i></a>
                                 </td>
                             </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <form method="post" action="<?= base_url('kasir/proses'); ?>">
        <div class="col-md-5">
            <div class="box box-widget">
                <div class="box-body">
                    <div class="card">
                     <!-- form start -->
                     <div class="card-body">
                        <div class="form-group row">
                            <label for="cash" class="col-sm-4 col-form-label">Cash</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="cash" name="cash" required>
                                <input type="hidden" class="form-control customer" id="customer" name="customer">
                            </div>
                        </div>
                        <div class="form-group row">
                             <div class="text-left col-md-6">
                                  <label for="grandtotal" class="col-form-label">Grand Total</label>
                             </div>
                             <div class="justify-content-end col-md-6">
                                   <h3><strong><?= rupiah($grand_total) == null ? '0' : rupiah($grand_total); ?></strong></h3>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
        <div class="row justify-content-end my-4">
            <a class="btn-lg btn-warning clear-cart" href="<?= base_url('kasir/clear'); ?>"><i class="fa fa-refresh"></i> New Order</a>
        </div>
        <br>
        <div class="row justify-content-end mb-4">
            <button class="btn-lg btn-success" type="submit"><i class="fa fa-send"></i> Process Order</button>
        </div>
    </div>
    </form>
    </div>
    

</section>