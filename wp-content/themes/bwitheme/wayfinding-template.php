<?php

/*

*

Template Name: Wayfinding

*/

  get_header(); ?>

 <main class="content_body full_width" style="margin-top: -70px;">
<style>
  div#header {display:none;}
</style> 
 <?php 

echo do_shortcode( '[custom_notification]' );

    //$slider = get_field('top_slider');
      //echo do_shortcode('[rev_slider alias="slider-1" slidertitle="Slider 1"][/rev_slider]');

 if (have_rows('modules')){
            while (have_rows('modules')){
                the_row();
                get_template_part('templates/module', get_row_layout());
            }
        }


 echo the_content();

 ?>
</main>
 

    <!--<div id="primary" class="container content-area">

    <main id="main" class="site-main" role="main">

        <?php

        // Start the loop.

       /* while ( have_posts() ) :

            the_post();

 

            // Include the page content template.

            get_template_part( 'template-parts/content', 'page' );

 

            // If comments are open or we have at least one comment, load up the comment template.

            if ( comments_open() || get_comments_number() ) {

                comments_template();

            }

 

            // End of the loop.

        endwhile;*/

        //echo do_shortcode( '[all_posts]' );

        

        

        

        ?>

 

    </main> -->

 

    <?php //get_sidebar( 'content-bottom' ); ?>

 

<!--</div>-->

 

<?php get_footer(); ?>