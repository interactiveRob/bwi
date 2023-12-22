<?php 
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$stat_one = get_sub_field('stat_one');
$stat_two = get_sub_field('stat_two');

?>
<div class="container-fluid custom_cont stats_container">
    <div class="row">
    	<header class="stats_header">
			<div class="stats_ribbon">
				<span class="stats_ribbon_icon">
					<svg class="symbol symbol_pie symbol_red"><use xlink:href="#pie"></use></svg>
				</span>
			</div>
			<h2 class="stats_title"><?php echo $title; ?></h2>
			<p class="stats_caption"><?php echo $subtitle; ?></p>
		</header>
		<div class="stats_body">
			<div class="stat">
					<h3 class="stat_quantity"><?php echo $stat_one['stat_quantity']; ?></h3>
					<p class="stat_caption"><?php echo $stat_one['stat_caption']; ?></p>
			</div>
			<div class="stat">
					<h3 class="stat_quantity"><?php echo $stat_two['stat_quantity']; ?></h3>
					<p class="stat_caption"><?php echo $stat_two['stat_caption']; ?></p>
			</div>
		</div>
    </div>
</div>