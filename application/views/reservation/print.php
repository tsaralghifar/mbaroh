
<!DOCTYPE html>
<html><head>
<link rel="STYLESHEET" href="<?= base_url('assets/'); ?>/print_static.css" type="text/css" />
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
<th style="text-align: center">Nama</th>
<th style="text-align: center">Phone</th>
<th style="text-align: center">Jumlah Orang</th>
<th style="text-align: center">Status</th>
<th style="text-align: center">Booking Time</th>
<th style="text-align: center">Booking Pada</th>
<th style="text-align: center">Bukti Transfer</th>
</tr>

<?php $no = 1;
foreach ($body as $bdy) : ?>
<tr>
<td style="text-align: center"><?= $no++; ?></td>
<td style="text-align: center"><?= $bdy->nama; ?></td>
<td style="text-align: center"><?= $bdy->phone; ?></td>
<td style="text-align: center"><?= $bdy->jumlah_orang; ?></td>
<td style="text-align: center-<?= $bdy->status_b == 'pending' ? 'danger' : 'success' ?>"><?= $bdy->status_b; ?></td>
<td style="text-align: center"><?= $bdy->booking_at; ?></td>
<td style="text-align: center"><?= $bdy->tgl_h; ?></td>
<td style="text-align: center"><img src="<?= base_url('uploads/reservation/') . $bdy->tf; ?> " alt="" height="80"></td>
</tr>
<?php endforeach; ?>
</tbody>





</table>



</div>

</div>
</div>

</body></html>