<div class="span8">
			<?php echo form_open('cicilan/insert_cicilan') ?>
			<fieldset>
<?php 
	if ($cicilan==null) {
		foreach ($null_cicilan as $key) {
	$UM = $key['harga_mobil'] * $key['uang_muka'] / 100;
	$PH = $key['harga_mobil'] - $UM; 
	$bunga= $PH * ($key['paket_jml_cicilan']/12*$key['bunga']) /100;
	$cicilan = ($PH + $bunga)/$key['paket_jml_cicilan'];
	$nilai_cicilan =  round($cicilan);
	$hasil =  "Rp ".number_format($nilai_cicilan,2,',','.');
	?>

			         <!-- input merk -->
			         <label>Kode Cicilan</label>
			         <div class="input-control text info-state">
			              <input type="text" name="kode_cicilan" value="<?php echo $kode ?>">
			          </div>
			          <!-- end merk -->

			         <!-- input merk -->
			         <label>Kode Kredit</label>
			         <div class="input-control text info-state">
			              <input type="text" name="kode_kredit" value="<?php echo $key['kode_kredit'] ?>">
			          </div>
			          <!-- end merk -->


			         <!-- input type -->
			         <label>Nama Pelanggan</label>
			         <div class="input-control text info-state">
			              <input type="text" value="<?php echo $key['nama_pembeli'] ?>" required>
			          </div>
			          <!-- end type -->

			         <!-- input warna -->
			         <label>Jumlah Cicilan Perbulan</label>
			         <div class="input-control text info-state">
			              <input type="text" name="jml_cicilan" value="<?php echo round($cicilan) ?>" required>
			          </div>
			          <!-- end warna -->

			         <!-- input warna -->
			         <label>Cicilan Ke</label>
			         <div class="input-control text info-state">
			              <input type="text" name="cicilan_ke" value="1" required>
			          </div>
			          <!-- end warna -->			          
					
			         <!-- input warna -->
			         <label>Cicilan Sisa Ke</label>
			         <div class="input-control text info-state">
			              <input type="text" name="cicilan_sisa_ke" value="<?php echo $key['paket_jml_cicilan']-1; ?>" required>
			          </div>
			          <!-- end warna -->

			         <!-- input warna -->
			         <label>Cicilan Sisa Harga</label>
			         <div class="input-control text info-state">
			              <input type="text" name="cicilan_sisa_harga" value="<?php echo round($key['harga_mobil']-$cicilan); ?>" required>
			          </div>
			          <!-- end warna -->

					<input type="submit" name="submit" value="Proses">
					<?php  } ?>	
			</fieldset>
			<?php echo form_close() ?>	
</div>

	<?php
	}else{
		$UM = $cicilan['harga_mobil'] * $cicilan['uang_muka'] / 100;
		$PH = $cicilan['harga_mobil'] - $UM; 
		$bunga= $PH * ($cicilan['paket_jml_cicilan']/12*$cicilan['bunga']) /100;
		$naonweah = ($PH + $bunga)/$cicilan['paket_jml_cicilan'];
		$nilai_cicilan =  round($naonweah);
		$hasil =  "Rp ".number_format($nilai_cicilan,2,',','.');
	?>
			         <!-- input merk -->
			         <label>Kode Cicilan</label>
			         <div class="input-control text info-state">
			              <input type="text" name="kode_cicilan" value="<?php echo $kode ?>">
			          </div>
			          <!-- end merk -->

			         <!-- input merk -->
			         <label>Kode Kredit</label>
			         <div class="input-control text info-state">
			              <input type="text" name="kode_kredit" value="<?php echo $cicilan['kode_kredit'] ?>">
			          </div>
			          <!-- end merk -->


			         <!-- input type -->
			         <label>Nama Pelanggan</label>
			         <div class="input-control text info-state">
			              <input type="text" value="<?php echo $cicilan['nama_pembeli'] ?>" required>
			          </div>
			          <!-- end type -->

			         <!-- input warna -->
			         <label>Jumlah Cicilan Perbulan</label>
			         <div class="input-control text info-state">
			              <input type="text" name="jml_cicilan" value="<?php echo round($naonweah) ?>" required>
			          </div>
			          <!-- end warna -->

			         <!-- input warna -->
			         <label>Cicilan Ke</label>
			         <div class="input-control text info-state">
			              <input type="text" name="cicilan_ke" value="<?php echo $cicilan['cicilan_ke']+1; ?>" required>
			          </div>
			          <!-- end warna -->			          
					
			         <!-- input warna -->
			         <label>Cicilan Sisa Ke</label>
			         <div class="input-control text info-state">
			              <input type="text" name="cicilan_sisa_ke" value="<?php echo $cicilan['cicilan_sisa_ke']-1; ?>" required>
			          </div>
			          <!-- end warna -->

			         <!-- input warna -->
			         <label>Cicilan Sisa Harga</label>
			         <div class="input-control text info-state">
			              <input type="text" name="cicilan_sisa_harga" value="<?php echo round($cicilan['cicilan_sisa_harga']-$naonweah); ?>" required>
			          </div>
			          <!-- end warna -->

					<input type="submit" name="submit" value="Proses">
					<?php  } ?>	
			</fieldset>
			<?php echo form_close() ?>	
</div>

    <script type="text/javascript" class="init">
      $(document).ready(function() {
          $('#example').dataTable();
          new $.fn.dataTable.AutoFill( table );
      } );

      $(".chzn-select").chosen();
      $(".chzn-select-deselect").chosen({allow_single_deselect:true});



    </script>
