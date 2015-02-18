<div class="tab-control" data-role="tab-control">
    <ul class="tabs">
    	<li class="active"><a href="#_page_1">Tambah Data Pelanggan</a></li>
    	<li><a href="#_page_2">Show Data Pelanggan</a></li>
    </ul>
     
    <div class="frames">
    	<div class="frame" id="_page_1">
			<table>
			<?php echo form_open('pelanggan/insert_pelanggan') ?>
				<fieldset>

			         <!-- input ktp -->
			         <label>KTP Pelanggan</label>
			         <div class="input-control text info-state">
			              <input type="text" name="ktp_pembeli" id="ktp" required>
			          </div>
			          <!-- end ktp -->					

			         <!-- input nama -->
			         <label>Nama Pelanggan</label>
			         <div class="input-control text info-state">
			              <input type="text" name="nama_pembeli" required>
			          </div>
			          <!-- end nama -->

			         <!-- input alamat -->
			         <label>Alamat</label>
			         <div class="input-control textarea info-state">
			              <textarea name="alamat_pembeli" required></textarea>
			          </div>
			          <!-- end input alamat -->

			         <!-- input telp -->
			         <label>No Telp Pelanggan (Hand Phone)</label>
			         <div class="input-control text info-state">
			              <input type="text" name="telp_pembeli" id="hp" required>
			          </div>
			          <!-- end telp -->

			          <input type="submit" name="submit" value="Proses" class="info">
				</fieldset>
			<?php echo form_close() ?>
			</table>    		
    	</div>

    	<div class="frame" id="_page_2">
    		<?php if (!$pelanggan==null){ ?>
				<table id="example" class="table striped hovered responsive dataTable" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>KTP Pelanggan</th>
							<th>Nama Pelanggan</th>
							<th>Alamat Pelanggan</th>
							<th>Telp Pelanggan</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($pelanggan as $key) { ?>	
					
						<tr>
							<td><?php echo $key['ktp_pembeli'] ?></td>
							<td><?php echo $key['nama_pembeli'] ?></td>
							<td><?php echo $key['alamat_pembeli'] ?></td>
							<td><?php echo $key['telp_pembeli'] ?></td>
							<td><?php echo $key['status']  ?>
							</td>
							<td>
								<?php echo '<a href="'.base_url().'pelanggan/delete_pelanggan/'.$key['ktp_pembeli'].'" onclick="return confirm(\'Anda yakin akan menghapus data pelanggan '.$key['nama_pembeli'].'?\')">DELETE</a>'?>
								 | <a href="<?php echo base_url('pelanggan/edit_pelanggan') ?>/<?php echo $key['ktp_pembeli'] ?>">EDIT</a>
							</td>							
						</tr>									
					<?php } ?>
					</tbody>
				</table>    		
    		<?php }else{ ?>
				<table id="example" class="table striped hovered responsive dataTable" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>KTP Pelanggan</th>
							<th>Nama Pelanggan</th>
							<th>Alamat Pelanggan</th>
							<th>Telp Pelanggan</th>
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

    <script type="text/javascript" class="init">
      $(document).ready(function() {
          $('#example').dataTable();
          new $.fn.dataTable.AutoFill( table );
      } );

      $(".chzn-select").chosen();
      $(".chzn-select-deselect").chosen({allow_single_deselect:true});

	jQuery(function($){
	   $("#ktp").mask("9999999999999999");
	   $("#hp").mask("999999999999");
	});


    </script>