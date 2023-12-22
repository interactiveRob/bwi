<?php 
$background_iamge = get_sub_field('background_image');
$services_tiles = get_sub_field('services_tiles');
$service_header = get_sub_field('service_header');
// print_r($service_header);
// print_r($background_iamge);
// print_r($services_tiles);


?>
<div class="container-fluid custom_cont services_container" style='background-image: url("<?php echo $background_iamge['url']; ?>"); opacity: 1;'>
    <div class="row">
    	<header class="services_header">
    	   <h2 class="services_title"><?php echo $service_header ?></h2>
			<!--<h2 class="services_title">Services</h2>-->
		</header>
		<div class="all_services_con">
			<?php foreach ($services_tiles as $services_tile) { ?>
			<div class="single_service" aria-hidden="false">
				<h3 class="service_title"><?php echo $services_tile['title']; ?></h3>
				<p class="service_caption"><?php echo $services_tile['description']; ?></p>
				<a class="service_link plan_callout_link underline_anim" href="<?php echo $services_tile['link']; ?>" aria-title="<?php echo $services_tile['title']; ?>">
					<span><?php echo $services_tile['link_text']; ?></span>
					<svg class="symbol symbol_arrow_right symbol_gray"><use xlink:href="#arrow_right"></use></svg>
				</a>
			</div>
			<?php } ?>
		</div>
    </div>
</div>