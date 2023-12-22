<?php 
$title = get_sub_field('title');
$subtitle = get_sub_field('subtitle');
$first_column = get_sub_field('first_column');
$second_column = get_sub_field('second_column');
$third_column = get_sub_field('third_column');

?>
<?php //print_r($first_column); ?>
<div class="container-fluid custom_cont facts_container">
    <div class="row">
    	<header class="facts_header">
			<h2 class="facts_title"><?php echo $title; ?></h2>
			<p class="facts_caption"><?php echo $subtitle; ?></p>
		</header>
		<div class="facts_wrapper">
			<article class="fact">
				<a class="fact_image_link" href="">

					<picture class="fact_picture">
							<source media="(min-width: 740px)" srcset="<?php print_r($first_column['image']['url']); ?>">
						<img class="fact_image" src="<?php echo $first_column['image']['url']; ?>" alt="<?php echo $first_column['image']['alt']; ?>">
					</picture>
				</a>
	            <div class="fact_inner">
		            <h4 class="fact_title"><?php echo $first_column['title']; ?></h4>
		            <span class="fact_caption"><?php echo $first_column['description']; ?></span>
		            <a class="plan_link_noborder" href="<?php echo $first_column['link']['url']; ?>" aria-title="<?php echo $first_column['title']; ?>">
		              <span><?php echo $first_column['link']['title']; ?></span>
		              			<svg class="symbol symbol_arrow_right symbol_gray">
					<use xlink:href="#arrow_right"></use>
				</svg>
		            </a>
	            </div>
			</article>
			<article class="fact">
				<a class="fact_image_link" href="">
					<picture class="fact_picture">
							<source media="(min-width: 740px)" srcset="<?php echo $second_column['image']['url']; ?>">
						<img class="fact_image" src="<?php echo $second_column['image']['url']; ?>" alt="<?php echo $second_column['image']['alt']; ?>">
					</picture>
				</a>
	            <div class="fact_inner">
		            <h4 class="fact_title"><?php echo $second_column['title']; ?></h4>
		            <span class="fact_caption"><?php echo $second_column['description']; ?></span>
		            <a class="plan_link_noborder" href="<?php echo $second_column['link']['url']; ?>" aria-title="<?php echo $second_column['title']; ?>">
		              <span><?php echo $second_column['link']['title']; ?></span>
		              			<svg class="symbol symbol_arrow_right symbol_gray">
					<use xlink:href="#arrow_right"></use>
				</svg>
		            </a>
	            </div>
			</article>
			<article class="fact">
				<a class="fact_image_link" href="">
					<picture class="fact_picture">
							<source media="(min-width: 740px)" srcset="<?php echo $third_column['image']['url']; ?>">
						<img class="fact_image" src="<?php echo $third_column['image']['url']; ?>" alt="<?php echo $third_column['image']['alt']; ?>">
					</picture>
				</a>
	            <div class="fact_inner">
		            <h4 class="fact_title"><?php echo $third_column['title']; ?></h4>
		            <span class="fact_caption"><?php echo $third_column['description']; ?></span>
		            <a class="plan_link_noborder" href="<?php echo $third_column['link']['url']; ?>" aria-title="<?php echo $third_column['title']; ?>">
		              <span><?php echo $third_column['link']['title']; ?></span>
		              			<svg class="symbol symbol_arrow_right symbol_gray">
					<use xlink:href="#arrow_right"></use>
				</svg>
		            </a>
	            </div>
			</article>
							
		</div>
    </div>
</div>