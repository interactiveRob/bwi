

<?php 

    if(is_page('wayfinding')){

		exit;

	}

?>


<?php if( is_search() ): 

 endif; ?>

<?php get_header(); ?>

<?php the_content(); ?>



<?php get_footer(); ?>