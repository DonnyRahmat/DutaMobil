<link rel="stylesheet" type="text/css" media="print,handheld" href="<?php echo base_url('assets/css/print.css') ?>"/>
<link href="<?php echo base_url('assets/css/font-awesome.css') ?>" rel="stylesheet">

<title>Faktur</title>

<center>
	<h1>Duta Mobil</h1>
</center>

<p align="left">
<h3>Faktur Pembelian Mobil <br /></h3>
<table>
	<tr>
		<td>Kode Pembelian</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td><?php echo $faktur->kode_cash ?></td>
	</tr>
	<tr>
		<td>Tanggal Pembelian</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td><?php $date=date_create($faktur->cash_tanggal); echo date_format($date,"d M Y"); ?></td>
	</tr>	
	<tr>
		<td>Pelanggan</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td><?php echo $faktur->nama_pembeli ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td><?php echo $faktur->alamat_pembeli ?></td>
	</tr>
	<tr>
		<td>No Telp</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td><?php echo $faktur->telp_pembeli ?></td>
	</tr>
	<tr>
		<td>User</td>
		<td>:</td>
		<td>&nbsp;</td>
		<td><?php echo $user ?></td>
	</tr>		
</table>

</p> 
<hr style="height:2px;border:none;color:#333;background-color:#333;" />
<hr style="height:2px;border:none;color:#333;background-color:#333;" />
<br/>
<table border="1" width="100%">
	<tr>
		<th>Kode Mobil</th>
		<th>Merk Mobil</th>
		<th>Type</th>
		<th>Warna</th>
		<th>Harga Mobil</th>
	</tr>
	<tr>
		<td><?php echo $faktur->kode_mobil ?></td>
		<td><?php echo $faktur->merk ?></td>
		<td><?php echo $faktur->type ?></td>
		<td><?php echo $faktur->warna ?></td>
		<td>Rp <?php $harga=$faktur->cash_bayar; echo number_format($harga,2,',','.')?></td>
	</tr>
	<tr>
		<td colspan="4" align="center"><b>Total Bayar</b></td>
		<td><b>Rp <?php $harga=$faktur->cash_bayar; echo number_format($harga,2,',','.')?></b></td>
	</tr>
</table>
<br />
<button onclick="window.print()" style="text-decoration:none;"><i class="fa fa-print"></i> Cetak Faktur</button>