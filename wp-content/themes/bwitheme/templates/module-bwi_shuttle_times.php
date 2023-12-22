<?php 

$left = get_sub_field('left_sec');
$right = get_sub_field('right_sec');

//print_r($right);

/*$bg_img = $left['background_map_image']['url'];
$left_sec_heading = $left['heading'];
$left_sec_Subheading = $left['subheading'];
$left_sec_description = $left['description'];
$left_sec_pdf_link = $left['pdf_file']['url'];*/


?>

<div class="container-fluid js-parking custom_bwi_shuttle_times">
    <div class="row">
		<div class="plan_callout media_loaded">
			<div class="js-background plan_background fs-background-element fs-background" data-background-options="{<?php echo $left['background_map_image']['url']; ?> } }">
				<div class="fs-background-container">
					<div class="fs-background-media fs-background-responsive fs-background-native" aria-hidden="true" style="background-image: url(<?php echo $left['background_map_image']['url']; ?>); opacity: 1;">
						<img alt="<?php echo $left['background_map_image']['alt']; ?>" src="<?php echo $left['background_map_image']['url']; ?>">
					</div>
				</div>
			</div>
			<div class="plan_callout_body">
				<h4 class="plan_callout_title"><?php echo $left['heading']; ?></h4>
				<h5 class="plan_callout_caption"><?php echo $left['subheading']; ?></h5>
				<p class="plan_callout_description"><?php echo $left['description']; ?></p>
				<a class="plan_callout_link" href="<?php echo $left['pdf_file']['url']; ?>">
					<span>View Parking Map</span>
					<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_gray">
						<use xlink:href="#arrow_right"></use>
					</svg>
				</a>
			</div>
		</div>
		<div class="plan_body">
			<header class="plan_header">
				<div class="plan_ribbon">
					 <span class="plan_ribbon_icon">
						 <svg aria-hidden="true" class="symbol symbol_clock symbol_red">
							 <use xlink:href="#clock"></use>
						 </svg>
					</span>
				</div>
				<div class="plan_heading">
					<h2 class="plan_title"><?php echo $right['heading']; ?></h2>
				</div>
			</header>
			<div class="plan_items">
				<div class="plan_item">
					<h4 class="plan_item_title">From Daily Parking</h4>
					<h5 class="plan_item_caption"><?php echo $right['daily_parking']; ?>*</h5>
				</div>
					<div class="plan_item">
					<h4 class="plan_item_title">From Express Parking</h4>
					<h5 class="plan_item_caption"><?php echo $right['express_parking']; ?>*</h5>
				</div>
					<div class="plan_item">
					<h4 class="plan_item_title">From Long-Term Parking</h4>
					<h5 class="plan_item_caption"><?php echo $right['long_term_parking']; ?>*</h5>
				</div>

			</div>
			<footer class="plan_details">
				<p class="plan_caption">* <?php echo $right['sub_text']; ?></p>
				<a class="plan_link" href="<?php echo $right['shuttle_map']['url']; ?>">
					<span>View Shuttle Map</span>
					<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_red">
						<use xlink:href="#arrow_right"></use>
					</svg>
				</a>
			</footer>
		</div>
	</div>
</div>
