
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<link rel="STYLESHEET" href="<?= base_url('assets/'); ?>nota.css" type="text/css" />
</head>

<body>

<div id="body" style="width: 57mm;">
  <div id="print-area">

    <div id="section_header">
    </div>
    
    <div id="content">
      
    <div class="page" style="font-size: 7pt">
    <table style="width: 100%;" class="header">
    <tr>
    <td><p style="text-align: center; font-style: normal; font-family: Monaco; font-size: 20pt;">NOTA BOOKING</p></td>
    </tr>
    </table>
    
    <table style="width: 100%; font-size: 12pt;">
    <tr>
    <td>Kode Booking: <?= $header->kode_booking; ?></td>
    </tr>
    
    <tr>
    
    </tr>
    
    <tr>
    <td>KOPI M'BAROH</td>
    <td style="text-align: right;">JL. Sukamara, Landasan Ulin</td>
    </tr>
    </table>
    <br>
    <br>
    <table class="change_order_items" style="font-size: 15pt; border: 1px dotted; width: 100%;">
    
    
    <tbody>
    <tr>
    <th style="border-bottom: 1px dotted;">Nama</th style="border-bottom: 1px dotted;">
    <th style="border-bottom: 1px dotted;">Jumlah Orang</th style="border-bottom: 1px dotted;">
    <th style="border-bottom: 1px dotted;">Book Time</th style="border-bottom: 1px dotted;">
    <!-- <th style="border-bottom: 1px dotted;">Total</th style="border-bottom: 1px dotted;"> -->
    </tr>
    
    <?php $no = 1;
    foreach ($body as $bdy) : ?>
    <tr class="even_row">
    <td style="text-align: center; "><?= $bdy->nama ?></td>
    <td style="text-align: center;"><?= $bdy->jumlah_orang ?></td>
    <td style="text-align: center; "><?= $bdy->booking_at; ?></td>
    <!-- <td style="text-align: right; "><?= rupiah($key->harga * $key->sold_qty); ?></td> -->
    </tr>
    <?php endforeach; ?>
    
    </tbody>
    
    </table>
    <table class="change_order_items" style="font-size: 15pt; border: 1px dotted; width: 100%;">
    
    
    <tbody>
    <tr>
    <th style="border-bottom: 1px dotted;">No</th>
    <th style="border-bottom: 1px dotted;">Menu</th style="border-bottom: 1px dotted;">
    <th style="border-bottom: 1px dotted;">Jumlah</th style="border-bottom: 1px dotted;">
    <th style="border-bottom: 1px dotted;">Harga</th style="border-bottom: 1px dotted;">
    <!-- <th style="border-bottom: 1px dotted;">Total</th style="border-bottom: 1px dotted;"> -->
    </tr>
    
    <?php $no = 1;
    foreach ($makanan as $key) : ?>
    <tr class="even_row">
    <td style="text-align: center; "><?= $no++; ?></td>
    <td style=""><?= $key->nama_menu; ?></td>
    <td style="text-align: center; "><?= $key->sold_qty; ?></td>
    <td style="text-align: right; "><?= rupiah($key->harga); ?></td>
    <!-- <td style="text-align: right; "><?= rupiah($key->harga * $key->sold_qty); ?></td> -->
    </tr>
    <?php endforeach; ?>
    
    </tbody>
    
    </table>
    
    <p style="text-align: right; font-size: 20px;">Jumlah Bayar:<br><?= rupiah($bdy->total_k); ?> </p>
    <br>
    <br>
    
      <p style="text-align: center; font-size: 15px;">Terimakasih telah berbelanja di tempat kami.</p>
    
    </div>
    
    </div>
    </div>
    
    <div style="text-align: right;">
      <button onclick="window.print()">Print</button>
      <button onclick="window.location.href='<?= base_url('reservation/'); ?>'">Kembali</button>
    </div>

</div>

</body>
</html>