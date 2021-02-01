
<!DOCTYPE html>
<html><head>
<link rel="STYLESHEET" href="<?= base_url('assets/'); ?>/print_static.css" type="text/css" />
<title><?= $title; ?></title>
</head><body onload="<?= $this->input->post('tipe') == 'print' ? 'window.print();' : ''; ?>">

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
<td>No. Doc: <strong><?= $header->no_doc; ?></strong></td>
<td>Dibuat oleh: <strong><?= $header->created_by; ?></strong></td>
</tr>

<tr>
<td>Dibuat pada: <strong><?= date('d M Y', strtotime($header->created_at)); ?></strong></td>
<td>Dicetak pada: <strong><?= date('d M Y H:i:s', time()); ?></strong></td>
</tr>

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
<th style="text-align: center">Total</th>
</tr>

<?php $no = 1;
      $jumlah = 0;
foreach ($body as $bdy) : ?>
<?php

  $jumlah = $jumlah + ($bdy->total);

?>
<tr>
<td style="text-align: center"><?= $no++; ?></td>
<td><?= $bdy->faktur; ?></td>
<td style="text-align: center"><?= rupiah($bdy->total); ?></td>
</tr>

<?php endforeach; ?>
<tr>
    <td colspan ='2' style="text-align: center">Total</td>
    <td class="text-align: center"><?= rupiah($jumlah); ?></td>
</tr>
</tbody>





</table>

<table class="sa_signature_box" style="border-top: 1px solid black; padding-top: 2em; margin-top: 2em;">

  <tr>    
    <td>ADMIN</td><td class="written_field" style="padding-left: 2.5in">&nbsp;</td>
    <td style="padding-left: 1em">PENERIMA</td><td class="written_field" style="padding-left: 2.5in; text-align: right;"></td>
  </tr>
  <tr>
    <td colspan="3" style="padding-top: 0em">&nbsp;</td>
    <td style="text-align: center; padding-top: 0em;"></td>
  </tr>

<tr><td colspan="4" style="white-space: normal">

</td>
</tr>

<tr>
<td colspan="2">
<span class="written_field" style="padding-left: 4em">&nbsp;</span>
<span class="written_field" style="padding-left: 8em;">&nbsp;</span> 
<span class="written_field" style="padding-left: 4em">&nbsp;</span>
</td>

<td colspan="2" style="padding-left: 1em;"><br/><br/>

<span class="written_field" style="padding-left: 2.5in">&nbsp;</span>
</td>
</tr>
</table>

</div>

</div>
</div>

</body></html>