<div class="tab-control" data-role="tab-control">
    <ul class="tabs">
    	<li class="active"><a href="#_page_1">Tambah Data Mobil</a></li>
    	<li><a href="#_page_2">Show Data Mobil</a></li>
    </ul>
     
    <div class="frames">
    	<div class="frame" id="_page_1">
			<?php echo form_open_multipart('crud_mobil/do_upload') ?>
			<fieldset>
			         <!-- input merk -->
			         <label>Merk Mobil</label>
			         <div class="input-control text info-state">
			              <input type="text" name="merk" required>
			          </div>
			          <!-- end merk -->


			         <!-- input type -->
			         <label>Type Mobil</label>
			         <div class="input-control text info-state">
			              <input type="text" name="type" required>
			          </div>
			          <!-- end type -->

			         <!-- input warna -->
			         <label>Warna Mobil</label>
			         <div class="input-control text info-state">
			              <input type="text" name="warna" required>
			          </div>
			          <!-- end warna -->

			         <!-- input harga -->
			         <label>Harga Mobil</label>
			         <div class="input-control text info-state">
			              <input type="number" name="harga_mobil" required>
			          </div>
			          <!-- end harga -->

			         <!-- input gambar -->
			         <label>Gambar Mobil</label>
					    <div class="input-control file info-state">
						    <input type="file" name="userfile" size="20" />
					    	<button class="btn-file"></button>
					    </div>
  		            <!-- end input gambar --> 
					
					<input type="submit" name="submit" value="Proses">
			</fieldset>
			<?php echo form_close() ?>   		
    	</div>

    	<div class="frame" id="_page_2">
    		<?php if (!$mobil==null){ ?>
				<table id="example" class="table striped hovered responsive dataTable" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Kode Mobil</th>
							<th>Merk Mobil</th>
							<th>Type Mobil</th>
							<th>Warna Mobil</th>
							<th>Harga Mobil</th>
							<th>Status</th>
							<th>Gambar</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($mobil as $key) { ?>	
					
						<tr>
							<td><?php echo $key['kode_mobil'] ?></td>
							<td><?php echo $key['merk'] ?></td>
							<td><?php echo $key['type'] ?></td>
							<td><?php echo $key['warna'] ?></td>
							<td><?php echo $key['harga_mobil'] ?></td>
							<td><?php echo $key['status'] ?></td>
							<td>
								<a class="example-image-link" href="<?php echo base_url('assets/images') ?>/<?php echo $key['gambar'] ?>" data-lightbox="example-1"><img style="width:500px;height:300px;" class="example-image" src="<?php echo base_url('assets/images') ?>/<?php echo $key['gambar'] ?>" alt="<?php echo $key['merk'] ?>" /></a>
							</td>
							<td>
								<?php echo '<a href="'.base_url().'index.php/crud_mobil/delete_mobil/'.$key['kode_mobil'].'" onclick="return confirm(\'Anda yakin akan menghapus data mobil '.$key['merk'].'?\')">DELETE</a>'?>
								 | <a href="<?php echo base_url('index.php/crud_mobil/edit_mobil') ?>/<?php echo $key['kode_mobil'] ?>">EDIT</a>
							</td>
						</tr>									
					<?php } ?>
					</tbody>
				</table>    		
    		<?php }else{ ?>
				<table id="example" class="table striped hovered responsive dataTable" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Kode Mobil</th>
							<th>Merk Mobil</th>
							<th>Type Mobil</th>
							<th>Warna Mobil</th>
							<th>Harga Mobil</th>
							<th>Status Mobil</th>
						</tr>
					</thead>
					<tbody>										
						<tr>
							<td colspan="6" align="center">Tidak Ada Data Mobil</td>
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