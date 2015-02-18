
    <style>
		body {
			margin: 0;
			padding: 0;
		}
		a {
			color: #09f;
		}
		a:hover {
			text-decoration: none;
		}
		#back_to_camera {
			clear: both;
			display: block;
			height: 80px;
			line-height: 40px;
			padding: 20px;
		}
		.fluid_container {
			margin: 0 auto;
		}
	</style>
    
    <script>
		jQuery(function(){
			jQuery('#camera_wrap_2').camera({
				height:'500px',
				width:'500px',
				loader: 'bar',
				pagination: false,
				thumbnails: true
			});
		});
	</script>


				<a class="tile double bg-violet" data-click="transform">
				    <div class="tile-content">
				        <div class="text-right padding10 ntp">
				            <h1 class="fg-white no-margin"><?php echo date('d'); ?></h1>
				        	<p class="fg-white"><?php echo date('l'); ?></p>
						</div>
				    </div>
				    <div class="brand">
				        <div class="label"><h3 class="no-margin fg-white"><span class="icon-calendar"></span></h3></div>
				    </div>
				</a>				

<button class="shortcut success">
	<i class="icon-cars"></i>
		Jumlah Mobil
	<small class="bg-cobalt fg-white"><?php echo $count_cars; ?></small>
</button>

<button class="shortcut bg-amber">
	<i class="icon-cart"></i>
		Buy Cash Today
	<small class="bg-cobalt fg-white"><?php echo $count_cash; ?></small>
</button>

<button class="shortcut primary">
	<i class="icon-briefcase"></i>
		Buy Kredit Today
	<small class="bg-cobalt fg-white"><?php echo $count_kredit; ?></small>
</button>	


<hr />

	<div class="fluid_container">
        <div class="camera_wrap camera_black_skin" id="camera_wrap_2">
            <div data-thumb="<?php echo base_url('assets/images/cars') ?>/viper2.jpg" data-src="<?php echo base_url('assets/images/cars') ?>/viper.jpg">
                <div class="camera_caption fadeFromBottom">
                    Dodge Viper GTS Team Oreca
                </div>
            </div>
            <div data-thumb="<?php echo base_url('assets/images/cars') ?>/escudo2.jpg" data-src="<?php echo base_url('assets/images/cars') ?>/escudo.jpg">
                <div class="camera_caption fadeFromBottom">
                    Escudo Pikes Peak Edition
                </div>
            </div>
            <div data-thumb="<?php echo base_url('assets/images/cars') ?>/gtone3.jpg" data-src="<?php echo base_url('assets/images/cars') ?>/gtone2.jpg">
                <div class="camera_caption fadeFromBottom">
                    Toyota GT-ONE '99
                </div>
            </div>
            <div data-thumb="<?php echo base_url('assets/images/cars') ?>/hot-rod2.jpg" data-src="<?php echo base_url('assets/images/cars') ?>/hot-rod.jpg">
                <div class="camera_caption fadeFromBottom">
                    Hot Rod '33
                </div>
            </div>
            <div data-thumb="<?php echo base_url('assets/images/cars') ?>/mini2.jpg" data-src="<?php echo base_url('assets/images/cars') ?>/mini.jpg">
                <div class="camera_caption fadeFromBottom">
                    Mini Cooper
                </div>
            </div>
            <div data-thumb="<?php echo base_url('assets/images/cars') ?>/shelby2.jpg" data-src="<?php echo base_url('assets/images/cars') ?>/shelby.jpg">
                <div class="camera_caption fadeFromBottom">
                    Shelby 427 '64
                </div>
            </div>
            <div data-thumb="<?php echo base_url('assets/images/cars') ?>/venom2.jpg" data-src="<?php echo base_url('assets/images/cars') ?>/venom.jpg">
                <div class="camera_caption fadeFromBottom">
                    Hennesey Venom GT
                </div>
            </div>            
        </div><!-- #camera_wrap_2 -->
    </div><!-- .fluid_container -->
    
    <div style="clear:both; display:block; height:100px"></div>

