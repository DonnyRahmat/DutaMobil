
<title>Faktur</title>
<body onload="faktur()"></body>

<script class="init">
function faktur() {
	var result = confirm('Apa anda mau mencetak fakturnya ?');
	
	if(result) {
		window.location = "<?php echo base_url(); ?>penjualan_cash/faktur";
	}else{
		window.location = "<?php echo base_url(); ?>penjualan_cash";
	}
}
</script>