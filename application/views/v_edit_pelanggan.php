<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Edit Page <br><hr />
<?php 
	$att = array('ktp_pembeli' => 'biodata-form');
	echo form_open('pelanggan/update_pelanggan',$att) ;
?>
	<input type="text" name="ktp_pembeli" value="<?php echo $edit->ktp_pembeli ?>" readonly/>
	<input type="text" name="nama_pembeli" value="<?php echo $edit->nama_pembeli ?>" />
	<input type="text" name="alamat_pembeli" value="<?php echo $edit->alamat_pembeli ?>" />
	<input type="text" name="telp_pembeli" value="<?php echo $edit->telp_pembeli ?>" />
	<input type="submit" name="submit" value="Update" class="success">
<?php echo form_close() ?>
</body>
</html>