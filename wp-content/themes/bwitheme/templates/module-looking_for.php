<?php 
$title = get_sub_field('title');
$description = get_sub_field('description');
$options_default_text = get_sub_field('option_default_text');
$option_links = get_sub_field('option_links');
//print_r($option_links);
$background_image = get_sub_field('background_image');

?>
<div class="container-fluid custom_cont looking_for">
    <div class="row">
    	<div class="destination_wrapper media_loaded" style="background-image: url(<?php echo $background_image['url']; ?>); opacity: 1;">
    		<div class="destination_body">
    			<div class="destination_details">
					<h2 class="destination_title"><?php echo $title; ?></h2>
					<p class="destination_caption"><?php echo $description; ?></p>
					<div class="fs-dropdown_wrapper info_dropdown_wrapper">
						<div class="custom-select" style="width:auto;">
						  <div class="select-selected">
						  	<?php if($options_default_text != ''){
						  		echo $options_default_text;
						  	} else {
						  		echo 'Select a Map';
						  	} ?>
						  </div>
						  <div class="select-items select-hide same-as-selected">
						  	<?php foreach($option_links as $option_link){ ?>
						<div class="same-as-selected">
						  	    <a href="<?php echo $option_link['link']['url']; ?>"><?php echo $option_link['link']['title']; ?></a>
</div>
						  	<?php } ?>
						  </div>
						</div>
					</div>
				</div>
    		</div>
    	</div>
    </div>
</div>