<?php 
$left_side = get_sub_field('left_side');
$parking_options = $left_side['parking_options'];
//$option_group = $parking_options['option_group'];
//print_r($parking_options);
//$parking_options = get_sub_field('parking_options');

$right_side = get_sub_field('right_side');
//print_r($right_side);


?>
<div class="container-fluid custom_cont facts_container where_park">
    <div class="row">
    	<div class="info_wrapper">
    		<img class="info_image" src="<?php echo $right_side['url']; ?>" alt="<?php echo $right_side['alt']; ?>">
    		<div class="info_body">
				<header class="info_header">
					<div class="info_ribbon">
						<span class="info_ribbon_bubble">
							<span class="info_ribbon_icon"><svg aria-hidden="true" class="symbol symbol_car symbol_red"><use xlink:href="#car"></use></svg></span>
						</span>
					</div>
					<div class="info_heading">
						<h2 class="info_title"><?php echo $left_side['title']; ?></h2>
						<p class="info_caption"><?php echo $left_side['description']; ?></p>
					</div>
				</header>
				<div class="info_items">
					<?php foreach($parking_options as $parking_option){ 
						$park_data = $parking_option['option_group'];
						?>
					<div class="info_item info_item_grouped">
						<a class="plan_link" href="<?php echo $park_data['link']['url']; ?>">
							<span><?php echo $park_data['link']['title']; ?></span>
							<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_red">
								<use xlink:href="#arrow_right"></use>
							</svg>
						</a>
						<p class="info_item_detail"><?php echo $park_data['sub_description']; ?></p>
						<p class="info_item_cost"><?php echo $park_data['price']; ?></p>
					</div>
					<?php } ?>
				</div>
			</div>
    	</div>
	</div>
</div>