<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
Edit Page <br><hr />
<?php 
	$att = array('kode_mobil' => 'biodata-form');
	echo form_open('crud_mobil/update_mobil',$att) ;
?>
	<input type="text" name="kode_mobil" value="<?php echo $edit->kode_mobil ?>" readonly/>
	<input type="text" name="merk" value="<?php echo $edit->merk ?>" />
	<input type="text" name="type" value="<?php echo $edit->type ?>" />
	<input type="text" name="warna" value="<?php echo $edit->warna ?>" />
	<input type="text" name="harga_mobil" value="<?php echo $edit->harga_mobil ?>" />
	<input type="submit" name="submit" value="submit">
<?php echo form_close() ?>
</body>
</html>