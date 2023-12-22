    <?php

/*

*

Template Name: Sidebar Left

*/

get_header(); 

$skip_content_btn = get_field('show_hide_skip_to_main_content');
//print_r($skip_content_btn);
$mobile_sidebar_title = get_field('mobile_sidebar_title');
// // uncommit for cghecking purpose
//   $header_image = get_field('top_header_with_image');
//   $page_capton = get_field('page_values');
//   $sub_caption = $page_capton['page_sub-title'];
//   $check = $page_capton['check_if_it_is_parent_page'];
//   //end checking

if (have_rows('modules'))
{
    while (have_rows('modules')){
         the_row();
         // echo "<script>console.log('" . json_encode( the_row()) . "');</script>";
         // echo "<script>console.log('" . json_encode( get_row_layout()) . "');</script>";

          if(get_row_layout() == 'top_header_image')
        {
              // echo "<script>console.log('" . json_encode( get_sub_field('page_values')['page_sub-title']) . "');</script>";
            
             $header_image = get_sub_field('top_header_with__image');
        }
        if(get_row_layout() == 'page_values_group')
        {
              // echo "<script>console.log('" . json_encode( get_sub_field('page_values')['page_sub-title']) . "');</script>";
             $sub_caption = get_sub_field('page_values')['page_sub-title'];
             $check = get_sub_field('page_values')['check-if_it_is_parent_page'];
        }
         
       
       //get_template_part('templates/module', get_row_layout());
    }
}
//print_r($check);

if ($skip_content_btn == '1') { ?>
    <div class="skip_content_btn">
        <a href="#main_content_scroll" class="plan_link"><span>Skip to Main Content</span><svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg></a>
    </div>
<?php }

echo do_shortcode( '[custom_notification]' );

if ($header_image['url'] != '') {  ?>


<div class="parent-div-top-section">
<div class="container-fluid header-section-custom" style='background-image: url("<?php echo $header_image['url']; ?>"); opacity: 1;'>
    <div class="botton-section-row ">
	<div class="container">
    <div class="row">
        <div class="botton-section-row-body">
                <h1 class="botton-section-row_title"><?php echo the_title(); ?></h1>
                <?php if (isset($sub_caption)) { ?>
                <p class="botton-section-row_caption"><?php print_r($sub_caption); ?></p>
                <?php } ?>
                
        </div>
    </div>
	</div>
    </div>
</div>
</div>




<!-- <div class="container-fluid custom_cont top_header_image" style='background-image: url("<?php //echo $header_image['url']; ?>"); opacity: 1;'>
    <div class="spotlight_row">
    <div class="row">
        <div class="spotlight_body">
                <h1 class="spotlight_title"><?php //echo the_title(); ?></h1>
                <?php //if (isset($sub_caption)) { ?>
                <p class="spotlight_caption"><?php //print_r($sub_caption); ?></p>
                <?php //} ?>
                
        </div>
    </div>
    </div>
</div> -->
<?php }
if($header_image['url'] == '' && $check == 1){
?>



<div class=" inner_page_title_con">
<div class="container title_con">
    <h1 class="inner_page_title "><?php echo the_title(); ?></h1>
    <?php if(isset($sub_caption)){ ?>
    <p class="inner_page_caption"><?php print_r($sub_caption); ?></p>
    <?php } ?>
</div>
</div>
 




<!--<div class="container title_con">
    <h1 class="spotlight_title ssssssssssssssss"><?php echo the_title(); ?></h1>
    <?php if(isset($sub_caption)){ ?>
    <p class="spotlight_caption"><?php print_r($sub_caption); ?></p>
    <?php } ?>
</div> -->

<?php } 
//$notifyclass = 'topimg_notify';
?> 
<!--<div class="notify <?php //echo ($header_image['url'] != '') ? $notifyclass : ''; ?>">
<?php //echo do_shortcode( '[custom_notification]' );?>
</div>-->
 <div class="container custom_contcls <?php if($header_image['url'] == '' && $check == 0){ ?>third_level_page <?php } ?>">

     <div class="row">

         <div class="col-sm-4 sidebar_menu sidebar_cell">

            <div class="sub_nav_header custom_childsidebar">
                <h2 class="sub_nav_title">
                <span class="close">Close</span>
                <span class="title">
                <?php  
                //echo the_title();               
                    if ( 0 == $post->post_parent ) {
                        if($mobile_sidebar_title != ''){
                            echo $mobile_sidebar_title;
                        } else {
                            the_title();
                        }
                    } else {
                        $parents = get_post_ancestors( $post->ID );
                        echo apply_filters( "the_title", get_the_title( end ( $parents ) ) );
                    }
                ?></span></h2>
            </div>
            <div class="sub_nav_wraper">
             <?php 
                if(is_active_sidebar('home_left_1')){
                    dynamic_sidebar('home_left_1');
                }

                /*$args = array(
                            'menu' => 'Main Menu', //Name of menu you created in WP admin
                            'depth' => 4, //define how deep you'd like the menu 0,1,2,3 etc
                            'items_wrap' => '<ul class="sidebar_menu">%3$s</ul>' 
                        );
                wp_nav_menu($args);*/

                wp_nav_menu( array( 'theme_location' => '', 'container_class' => 'secondry_menu', 'menu' => 'Secondry Menu' ) );
             ?>
            </div>
         </div>

         <div class="col-sm-8">
            <?php the_breadcrumb(); //get_breadcrumb(); ?>
            <div class="typography">
                <?php if($header_image['url'] == '' && $check == ''){ ?>
                <h2 class="page_title" id="page_title"><span><?php echo the_title(); ?></span>
                </h2>
                <?php }
                 echo the_content(); 
             //print_r($sec_img_right);
             ?>
            </div>
             
         </div>
     </div>

 </div>
 <?php 

 if (have_rows('modules')){
    while (have_rows('modules')){
        the_row();
        if(get_row_layout() != 'top_header_image' && get_row_layout() != 'page_values_group')
        {
            get_template_part('templates/module', get_row_layout());
        }
    }
 }    

 ?>

  

<style type="text/css">
    /*.container.title_con {
    padding-top: 30px;
}*/
</style>

<?php get_footer(); ?>