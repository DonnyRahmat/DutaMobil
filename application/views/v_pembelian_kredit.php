<div class="tab-control" data-role="tab-control">
    <ul class="tabs">
    	<li class="active"><a href="#_page_1">Tambah Data Penjualan Kredit</a></li>
    	<li><a href="#_page_2">Show Data Penjualan Kredit</a></li>
    </ul>
     
    <div class="frames">
    	<div class="frame" id="_page_1">
			<table>
			<?php echo form_open('pembelian_kredit/insert_pembelian_kredit') ?>
				<fieldset>

					<label>Kode Kredit</label>
					<div class="input-control text">
						<input type="text" value="<?php echo $kode ?>" placeholder="input text" disabled/>
						<button class="btn-clear"></button>
					</div>

			         <!-- input kategori -->
			         <label>Pembeli</label>
			         <div class="input-control select info-state">
			             <select name="ktp_pembeli" class="chzn-select" id="form-field-select-4" data-placeholder="Pilih Pembeli" required>
			                <option value=""></option>
			                <?php foreach ($pelanggan as $m):?>
			                <option value="<?php echo $m['ktp_pembeli']; ?>"><?php echo $m['nama_pembeli']; ?></option>
			                 <?php endforeach ?>
			              </select>
			           </div>
			           <!-- end input kategori --> 

			         <!-- input kategori -->
			         <label>Kode Paket</label>
			         <div class="input-control select info-state">
			             <select name="kode_paket" class="chzn-select" id="form-field-select-4" data-placeholder="Pilih Paket" required>
			                <option value=""></option>
			                <?php foreach ($paket as $m):?>
			                <option value="<?php echo $m['kode_paket']; ?>">Uang Muka : <?php echo $m['uang_muka']; ?>%, Jumlah Cicilan : <?php echo $m['paket_jml_cicilan'] ?> Bulan, Bunga : <?php echo $m['bunga'] ?>%</option>
			                 <?php endforeach ?>
			              </select>
			           </div>
			           <!-- end input kategori -->          

			         <!-- input kategori -->
			         <label>Mobil</label>
			         <div class="input-control select info-state">
			             <select name="kode_mobil" class="chzn-select" id="form-field-select-4" data-placeholder="Pilih Mobil" required>
			                <option value=""></option>
			                <?php foreach ($mobil as $m):?>
			                <option value="<?php echo $m['kode_mobil']; ?>"><?php echo $m['merk']; ?></option>
			                 <?php endforeach ?>
			              </select>
			           </div>
			           <!-- end input kategori -->          

			          <input type="submit" name="submit" value="Proses" class="info">
				</fieldset>
			<?php echo form_close() ?>
			</table>    		
    	</div>

    	<div class="frame" id="_page_2">
    		<?php if (!$kredit==null){ ?>
				<table id="example" class="table striped hovered responsive dataTable" cellspacing="0" width="100%">
					<thead>
						<tr>						
							<th>Kode Kredit</th>
							<th>KTP Pembeli</th>
							<th>Kode Paket</th>
							<th>Kode Mobil</th>
							<th>Tgl Kredit</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($kredit as $key) { ?>	
					
						<tr>
							<td><?php echo $key['kode_kredit'] ?></td>
							<td><?php echo $key['ktp_pembeli'] ?></td>
							<td><?php echo $key['kode_paket'] ?></td>
							<td><?php echo $key['kode_mobil'] ?></td>
							<td><?php echo $key['tgl_kredit'] ?></td>
						</tr>									
					<?php } ?>
					</tbody>
				</table>    		
    		<?php }else{ ?>
				<table class="table striped hovered responsive">
					<thead>
						<tr>
							<th>Kode Kredit</th>
							<th>KTP Pembeli</th>
							<th>Kode Paket</th>
							<th>Kode Mobil</th>
							<th>Tgl Kredit</th>
						</tr>
					</thead>
					<tbody>										
						<tr>
							<td colspan="6" align="center">Tidak Ada Data Penjualan Kredit</td>
						</tr>
					</tbody>
				</table>				    		
    		<?php } ?>
    	</div>
    </div>
</div>
    <script type="text/javascript" class="init">
      $(document).ready(function() {
          $('#example').dataTable();
          new $.fn.dataTable.AutoFill( table );
      } );

      $(".chzn-select").chosen();
      $(".chzn-select-deselect").chosen({allow_single_deselect:true});



    </script>