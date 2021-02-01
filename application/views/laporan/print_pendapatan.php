
<!DOCTYPE html>
<html><head>
<link rel="STYLESHEET" href="<?= base_url('assets/'); ?>/print_static.css" type="text/css" />

<link href="<?= base_url('frontend/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

<title><?= $title; ?></title>
</head><body onload="window.print();">

<div id="body">

<div id="section_header">
</div>

<div id="content">
  
<div class="page" style="font-size: 7pt">
<table style="width: 100%;" class="header">
<tr>
<td><h1 style="text-align: left"><?= $title; ?></h1></td>
</tr>
</table>

<table style="width: 100%; font-size: 8pt;">



<tr>
<td><strong>Kopi M'Baroh</strong></td>
<td>Alamat: <strong>JL. Sukamara, Landasan Ulin</strong></td>
</tr>
</table>

<table class="change_order_items">

<!-- <tr><td colspan="6"><h2>INVENTORI SISTEM</h2></td></tr> -->

<tbody>
<tr>
<th style="text-align: center">No</th>
<th style="text-align: center">Faktur</th>
<th style="text-align: center">Tanggal</th>
<th style="text-align: center">Jenis Transaksi</th>
<th style="text-align: center">Nominal</th>
</tr>

<?php $no = 1;
    $jumlah = 0;
    $count = 0;
foreach ($body as $bdy) : ?>
<?php

$jumlah = $jumlah + ($bdy->total);

?>
<tr>
<td style="text-align: center"><?= $no++; ?></td>
<td style="text-align: center"><?= $bdy->faktur; ?></td>
<td style="text-align: center"><?= $bdy->waktu_transaksi; ?></td>
<td style="text-align: center"><?= $bdy->tipe; ?></td>
<td style="text-align: center"><?= $bdy->total; ?></td>
</tr>
<?php endforeach; ?>
<tr>
    <td colspan ='4' style="text-align: center">Total</td>
    <td class="text-align: center"><?= rupiah($jumlah); ?></td>
</tr>
</tbody>





</table>



</div>

</div>
</div>

</body></html>