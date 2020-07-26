
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
<td>Alamat: <strong>JL. Kebenaran</strong></td>
</tr>
</table>

<table class="change_order_items">

<!-- <tr><td colspan="6"><h2>INVENTORI SISTEM</h2></td></tr> -->

<tbody>
<tr>
<th style="text-align: center">No</th>
<th style="text-align: center">Nama Pelanggan</th>
<th style="text-align: center">Kritik & Saran</th>
<th style="text-align: center">Rating</th>
</tr>

<?php $no = 1;
    $jumlah = 0;
    $count = 0;
foreach ($body as $bdy) : ?>
<?php
    $jumlah = $jumlah + ($bdy->rateIndex+1);
    $count = $count+1;
?>
<tr>
<td style="text-align: center"><?= $no++; ?></td>
<td style="text-align: center"><?= $bdy->nama_plgn; ?></td>
<td style="text-align: center"><?= $bdy->kritik_saran; ?></td>
<td style="text-align: center">
<div class="text-center">
            <i class="fa fa-star" data-index="0" <?= $bdy->rateIndex >= 0 ? 'style="color: yellow;"' : null; ?>></i>
            <i class="fa fa-star" data-index="1" <?= $bdy->rateIndex >= 1 ? 'style="color: yellow;"' : null; ?>></i>
            <i class="fa fa-star" data-index="2" <?= $bdy->rateIndex >= 2 ? 'style="color: yellow;"' : null; ?>></i>
            <i class="fa fa-star" data-index="3" <?= $bdy->rateIndex >= 3 ? 'style="color: yellow;"' : null; ?>></i>
            <i class="fa fa-star" data-index="4" <?= $bdy->rateIndex == 4 ? 'style="color: yellow;"' : null; ?>></i>
        </div>
</td>
</tr>
<?php endforeach; ?>
<tr>
    <td colspan ='3' style="text-align: center">Rata-Rata</td>
    <td class="text-center"><?= $jumlah/$count ?></td>
</tr>
</tbody>





</table>



</div>

</div>
</div>

</body></html>