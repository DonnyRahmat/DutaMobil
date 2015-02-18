<!DOCTYPE html>
<html lang="en">
<head>

    <!-- <link rel="icon" href="<?php echo base_url() ?>assets/images/BP Donny.png" /> -->
    <link href="<?php echo base_url() ?>assets/css/metro-bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/iconFont.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/jquery.dataTables.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/dataTables.autoFill.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/dataTables.responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/pace.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/chosen.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/camera.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/lightbox.css" rel="stylesheet">


    <!-- Load JavaScript Libraries -->
    <script src="<?php echo base_url() ?>assets/js/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.widget.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.mousewheel.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro.min.js "></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.dataTables.js "></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.autoFill.js "></script>
    <script src="<?php echo base_url() ?>assets/js/dataTables.responsive.js "></script>
    <script src="<?php echo base_url() ?>assets/js/chosen.jquery.min.js "></script>
    <script src="<?php echo base_url() ?>assets/js/pace.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src='<?php echo base_url() ?>assets/js/jquery.mobile.customized.min.js'></script>
    <script src='<?php echo base_url() ?>assets/js/jquery.easing.1.3.js'></script> 
    <script src='<?php echo base_url() ?>assets/js/camera.min.js'></script>
    <script src='<?php echo base_url() ?>assets/js/lightbox.min.js'></script>
    <script src='<?php echo base_url() ?>assets/js/jquery.maskedinput.js'></script>
    
    <!-- metro plugin -->
    <script src="<?php echo base_url() ?>assets/js/metro/metro-datepicker.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro/metro-calendar.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro/metro-hint.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro/metro-notify.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro/metro-dialog.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro/metro-tab-control.js "></script>
    <script src="<?php echo base_url() ?>assets/js/metro/metro-dropdown.js "></script>

    <title>Duta Mobil</title>
  

</head>

<body class="metro">
<div class="navigation-bar dark fixed-top shadow">
    <div class="navigation-bar-content container">
        <a href="<?php echo base_url() ?>" class="element"><i class="fa fa-car fa-fw"></i> Duta Mobil</a>
        <span class="element-divider"></span>

        <a class="element1 pull-menu" href="#"></a>

        <?php if ($level=="superuser") { ?>
        <ul class="element-menu">     
            
            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Mobil</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('crud_mobil') ?>">Daftar Mobil</a></li>
                    <li><a href="<?php echo base_url('crud_mobil') ?>">Penerimaan Mobil</a></li>
                </ul>                
            </li>
            
            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Data Pelanggan</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('pelanggan') ?>">Daftar Pelanggan</a></li>
                    <li><a href="<?php echo base_url('pelanggan') ?>">Register Pelanggan</a></li>
                </ul>                
            </li>

            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Transaksi</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('penjualan_cash') ?>">Pembelian Mobil Cash</a></li>
                    <li><a href="<?php echo base_url('pembelian_kredit') ?>">Pembelian Mobil Kredit</a></li>
                    <li><a href="<?php echo base_url('cicilan') ?>">Pembayaran Cicilan</a></li>
                </ul>                
            </li>

            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Laporan</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('') ?>">Daftar Pelanggan</a></li>
                    <li><a href="<?php echo base_url('') ?>">Mobil Terjual</a></li>
                    <li><a href="<?php echo base_url('') ?>">Transaksi Penjualan</a></li>
                </ul>                
            </li>

            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Utility</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('') ?>">Register User</a></li>
                    <li><a href="<?php echo base_url('') ?>">Ganti Password</a></li>
                    <li><a href="<?php echo base_url('') ?>">Tentang Program</a></li>
                </ul>                
            </li>

        </ul>        
        <?php }elseif ($level=="admin") { ?> 
        <ul class="element-menu">             
            
            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Laporan</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('') ?>">Daftar Pelanggan</a></li>
                    <li><a href="<?php echo base_url('') ?>">Mobil Terjual</a></li>
                    <li><a href="<?php echo base_url('') ?>">Transaksi Penjualan</a></li>
                </ul>                
            </li>

            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Utility</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('') ?>">Register User</a></li>
                    <li><a href="<?php echo base_url('') ?>">Ganti Password</a></li>
                    <li><a href="<?php echo base_url('') ?>">Logout</a></li>
                    <li><a href="<?php echo base_url('') ?>">Tentang Program</a></li>
                </ul>                
            </li>

        </ul>
        <?php }elseif ($level=="user") { ?>
        <ul class="element-menu">     
            
            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Mobil</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('crud_mobil') ?>">Daftar Mobil</a></li>
                    <li><a href="<?php echo base_url('crud_mobil') ?>">Penerimaan Mobil</a></li>
                </ul>                
            </li>
            
            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Data Pelanggan</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('pelanggan') ?>">Daftar Pelanggan</a></li>
                    <li><a href="<?php echo base_url('pelanggan') ?>">Register Pelanggan</a></li>
                </ul>                
            </li>

            <li>
                <a class="dropdown-toggle <?php echo $this->uri->segment(1)=="buy_tickets"?'fg-yellow':'' ?>" href="#">Transaksi</a>

                <ul class="dropdown-menu" data-role="dropdown">
                    <li><a href="<?php echo base_url('penjualan_cash') ?>">Pembelian Mobil Cash</a></li>
                    <li><a href="<?php echo base_url('pembelian_kredit') ?>">Pembelian Mobil Kredit</a></li>
                    <li><a href="<?php echo base_url('cicilan') ?>">Pembayaran Cicilan</a></li>
                </ul>                
            </li>
        </ul>        
        <?php  } ?>


        <div class="no-tablet-portrait no-phone">
            
            <span class="element-divider place-right"></span>

            <a title="Logout" href="<?php echo base_url('home/logout'); ?>" class="element place-right">
                <span class="icon-switch"></span>
            </a>

            <span class="element-divider place-right"></span>
        </div>
    </div>
</div>


<div class="container">
  <div class="grid">
    <div class="row">
  <br />
<br />

  <div postition="right">  
    <div class="times" data-blink="false" data-style-background="bg-dark" data-role="times"></div>     
  </div>


  <br />