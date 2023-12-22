<?php 

$description = get_sub_field('quote_description');
$author_name = get_sub_field('author_name');
$author_position = get_sub_field('author_position');
$quote_image = get_sub_field('quote_image');


?>

<div class="container-fluid custom_cont quote_container custom_blockquote">
    <div class="row">
    	<div class="quote_details">
			<p class="quote_description"><?php echo $description; ?></p>
			<cite class="quote_cite">
				<span class="quote_name"><?php echo $author_name; ?></span>
				<span class="quote_position"><?php echo $author_position; ?></span>
			</cite>
		</div>
    	<img class="quote_image" src="<?php echo $quote_image['url']; ?>" alt="<?php echo $quote_image['alt']; ?>">

    </div>
</div>