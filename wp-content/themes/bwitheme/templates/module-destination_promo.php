<?php 
$title = get_sub_field('title');
$sub_title = get_sub_field('subtitle');
$button = get_sub_field('button');
$description = get_sub_field('description');
$background_image = get_sub_field('background_image');
$tile_left = get_sub_field('tile_with_text_left_side');
//print_r($tile_left);
//if($tile_left == '1')

$card_left = 'card_left';
?>

<div class="container-fluid custom_cont destination_container <?php if($tile_left == '1'){?>card_left<?php } ?>">
    <div class="row">
    	<div class="destination_wrapper media_loaded">
			<div class="js-background destination_background fs-background-element fs-background" data-background-options="<?php echo $background_image['url']; ?>">
				<div class="fs-background-container">
					<div class="fs-background-media fs-background-responsive fs-background-native" aria-hidden="true" style="background-image: url(<?php echo $background_image['url']; ?>); opacity: 1;"><img src="<?php echo $background_image['url']; ?>">
					</div>
				</div>
			</div>
			<div class="destination_body">
				<div class="destination_details">
					<h2 class="destination_title"><?php echo $title; ?></h2>
					<p class="destination_caption"><?php echo $sub_title; ?></p>
					<a class="plan_link" href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" aria-title="Open page for more info on Inspiring Destinations">
							<span><?php echo $button['title']; ?></span>
							<svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg>
					</a>
				</div>
			</div>
			<div class="destination_subcaption">
				<span class="destination_subcaption_text"><?php echo $description; ?></span>
			</div>
		</div>
    </div>
</div>