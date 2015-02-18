<div class="tab-control" data-role="tab-control">
    <ul class="tabs">
    	<li class="active"><a href="#_page_1">Tambah Data Paket Kredit</a></li>
    	<li><a href="#_page_2">Show Data Paket Kredit</a></li>
    </ul>
     
    <div class="frames">
    	<div class="frame" id="_page_1">
			<table>
			<?php echo form_open('paket_kredit/insert_paket_kredit') ?>
				<fieldset>

			         <!-- input ktp -->
			         <label>Uang Muka</label>
			         <div class="input-control text info-state">
			              <input type="text" name="uang_muka" required>
			          </div>
			          <!-- end ktp -->					

			         <!-- input ktp -->
			         <label>Lama Cicilan</label>
			         <div class="input-control text info-state">
			              <input type="number" name="paket_jml_cicilan" required>
			          </div>
			          <!-- end ktp -->

			         <!-- input nama -->
			         <label>Bunga</label>
			         <div class="input-control text info-state">
			              <input type="text" name="bunga" required>
			          </div>
			          <!-- end nama -->

			          <input type="submit" name="submit" value="Proses" class="info">
				</fieldset>
			<?php echo form_close() ?>
			</table>    		
    	</div>

    	<div class="frame" id="_page_2">
    		<?php if (!$paket==null){ ?>
				<table class="table striped hovered bordered">
					<thead>
						<tr>						
							<th>Kode Paket</th>
							<th>Uang Muka</th>
							<th>Jumlah Cicilan</th>
							<th>Bunga</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($paket as $key) { ?>	
					
						<tr>
							<td><?php echo $key['kode_paket'] ?></td>
							<td><?php echo $key['uang_muka'] ?>%</td>
							<td><?php echo $key['paket_jml_cicilan'] ?></td>
							<td><?php echo $key['bunga'] ?>%</td>
						</tr>									
					<?php } ?>
					</tbody>
				</table>    		
    		<?php }else{ ?>
				<table class="table striped hovered">
					<thead>
						<tr>
							<th>Kode Paket</th>
							<th>Uang Muka</th>
							<th>Jumlah Cicilan</th>
							<th>Bunga</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>										
						<tr>
							<td colspan="5" align="center">Tidak Ada Data Pelanggan</td>
						</tr>
					</tbody>
				</table>				    		
    		<?php } ?>
    	</div>
    </div>
</div>