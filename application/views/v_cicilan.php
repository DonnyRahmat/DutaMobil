
<table id="example" class="table striped hovered responsive dataTable" cellspacing="0" width="100%" aria-describedby="example_info">
	<thead>
		<th>Kode Kredit</th>
		<th>Merk</th>
		<th>Harga</th>
		<th>Jumlah Cicilan</th>
		<th>Bunga</th>
		<th>Uang Muka</th>
		<th>Pelanggan</th>
		<th>Cicilan Perbulan</th>
		<th>Action</th>
	</thead>
	<tbody>
		<?php foreach ($all_cicilan as $key) { 
			$UM = $key['harga_mobil'] * $key['uang_muka'] / 100;
			$PH = $key['harga_mobil'] - $UM; 
			$bunga= $PH * ($key['paket_jml_cicilan']/12*$key['bunga']) /100;
			$cicilan = ($PH + $bunga)/$key['paket_jml_cicilan'];
			$nilai_cicilan =  round($cicilan);
			$hasil =  "Rp ".number_format($nilai_cicilan,2,',','.');
		?>
		<tr>
			<td align="center"><?php echo $key['kode_kredit'] ?></td>
			<td align="center"><?php echo $key['merk'] ?></td>
			<td align="center"><?php echo number_format($key['harga_mobil'],2, ',', '.') ?></td>
			<td align="center"><?php echo $key['paket_jml_cicilan'] ?> Bulan</td>
			<td align="center"><?php echo $key['bunga'] ?>%</td>
			<td align="center"><?php echo $key['uang_muka'] ?>%</td>
			<td align="center"><?php echo $key['nama_pembeli'] ?></td>
			<td align="center"><?php echo $hasil; ?></td>
			<td align="center">
				<a href="<?php echo base_url('cicilan/bayar_cicilan') ?>/<?php echo $key['kode_kredit'] ?>">Bayar Angsuran</a></td>
			</tr>
		<?php 
} 
?>
	</tbody>	
</table>
    <script type="text/javascript" class="init">
      $(document).ready(function() {
          $('#example').dataTable();
          new $.fn.dataTable.AutoFill( table );
      } );

      $(".chzn-select").chosen();
      $(".chzn-select-deselect").chosen({allow_single_deselect:true});



    </script>

