<script>

function proses() {
	var result = confirm('Apakah Anda Yakin Dengan Data Tersebut ? ');
	
	if(result) {
		window.location = "<?php echo base_url(); ?>penjualan_cash/insert_cash";
	}else{
		return false; // cancel button
	}
}

</script>

<div class="tab-control" data-role="tab-control">
    <ul class="tabs">
    	<li class="active"><a href="#_page_1">Tambah Data Penjualan Cash</a></li>
    	<li><a href="#_page_2">Show Data Penjualan Cash</a></li>
    </ul>
     
    <div class="frames">
    	<div class="frame" id="_page_1">
			  <?php echo form_open('penjualan_cash/insert_cash')?>
			  	<?php echo form_open('penjualan_cash/insert_cash')?>
			     <fieldset>
					<label>Kode Pembelian Cash</label>
					<div class="input-control text">
						<input type="text" value="<?php echo $kode ?>" placeholder="input text" disabled/>
						<button class="btn-clear"></button>
					</div>					
			         <!-- input kategori -->
			         <label>Pembeli</label>
			         <div class="input-control select info-state">
			         <?php if ($pelanggan==null){ 
			         	echo "<code>Semua pelanggan sedang kredit,";
			         	echo anchor('pelanggan','Tambah Pembeli Baru');
			         	echo "</code>";
			         	}else{
			         ?> 	
			             <select name="ktp_pembeli" class="chzn-select" id="form-field-select-4" data-placeholder="Pilih Pembeli" required>
			                <option value=""></option>
			                <?php 
			                	foreach ($pelanggan as $m){
			                	 ?>
			                <option value="<?php echo $m['ktp_pembeli']; ?>"><?php echo $m['nama_pembeli']; ?></option><?php $pembeli=$m['nama_pembeli']; ?>
			                 <?php } }
			                 ?>
			              </select>
			           </div>
			           <!-- end input kategori --> 

			         <!-- input kategori -->
			         <label>Mobil</label>
			         <div class="input-control select info-state">
			             <select name="mobil" class="chzn-select" id="form-field-select-4" data-placeholder="Pilih Mobil" required>
			                <option value=""></option>
			                <?php foreach ($mobil as $m):?>
			                <option value="<?php echo $m['kode_mobil']; ?>"><?php echo $m['merk']; ?></option>
			                 <?php endforeach ?>
			              </select>
			           </div>
			           <!-- end input kategori -->             
			          <input type="submit" value="Proses" name="submit" class="info large" onclick="proses()">
			       </fieldset>
			    </form>			    
			  </form>
  		
    	</div>

    	<div class="frame" id="_page_2">
    		<?php if (!$cash==null){ ?>
				<table id="example" class="display responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Kode Cash</th>
							<th>KTP Pembeli</th>
							<th>Kode Mobil</th>
							<th>Tanggal Pembayaran</th>
							<th>Total Pembayaran</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($cash as $key) { ?>	
					
						<tr>
							<td><?php echo $key['kode_cash'] ?></td>
							<td><?php echo $key['ktp_pembeli'] ?></td>
							<td><?php echo $key['kode_mobil'] ?></td>
							<td><?php echo $key['cash_tanggal'] ?></td>
							<td><?php echo $key['cash_bayar'] ?></td>
							<td>
								
							</td>
						</tr>									
					<?php } ?>
					</tbody>
				</table>		
    		<?php }else{ ?>
				<table id="example" class="display responsive nowrap" cellspacing="0" width="100%">
					<tbody>										
						<tr>
							<td colspan="6" align="center">Tidak Ada Data Penjualan Cash</td>
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