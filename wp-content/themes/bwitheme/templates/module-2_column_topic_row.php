<?php 
$left_side = get_sub_field('left_side');
$right_side = get_sub_field('right_side');
?>
<div class="container-fluid custom_cont custom_2column_topicrow callouts_container_outer">
<div class="container-fluid custom_cont custom_2column_topicrow callouts_container">
    <div class="row">
    	<div class="callouts_wrapper">
				<article class="callout">
					<h2 class="callout_title"><?php echo $left_side['title']; ?></h2>
					<a class="callout_image_link" href="">	<img class="callout_image" src="<?php echo $left_side['image']['url']; ?>" alt="<?php echo $left_side['image']['alt']; ?>"></a>
					<p class="callout_caption"><?php echo $left_side['description']; ?></p>
					<a class="plan_link" href="<?php echo $left_side['link']['url']; ?>" target="<?php echo $left_side['link']['target']; ?>" aria-title="Open page for more info on Flights">
						<span><?php echo $left_side['link']['title']; ?></span>
					<svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg>
	
					</a>
				</article>
				<article class="callout">
					<h2 class="callout_title"><?php echo $right_side['title']; ?></h2>
					<a class="callout_image_link" href="">	<img class="callout_image" src="<?php echo $right_side['image']['url']; ?>" alt="<?php echo $right_side['image']['alt']; ?>"></a>
					<p class="callout_caption"><?php echo $right_side['description']; ?></p>
					<a class="plan_link" href="<?php echo $right_side['link']['url']; ?>" target="<?php echo $right_side['link']['target']; ?>" aria-title="Open page for more info on Flights">
						<span><?php echo $right_side['link']['title']; ?></span>
					<svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg>
	
					</a>
				</article>
			
		</div>
    </div>
</div></div>