
<?php
/*

*

Template Name: Press/Media

*/

get_header(); 
$currentUrl = $_SERVER['REQUEST_URI'];
$currentUrlnew = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$currentUrlnew .= $_SERVER['HTTP_HOST'];
$currentUrlnew .= $_SERVER['REQUEST_URI'];

$skip_content_btn = get_field('show_hide_skip_to_main_content');

if ($skip_content_btn == '1') { ?>
    <div class="skip_content_btn">
        <a href="#main_content_scroll" class="plan_link"><span>Skip to Main Content</span><svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg></a>
    </div>
<?php }

//global $post;

// $header_image = get_field('top_header_with_image');
// $page_capton = get_field('page_values');
// $sub_caption = $page_capton['page_sub-title'];
// $check = $page_capton['check_if_it_is_parent_page'];
if (have_rows('modules'))
{
    while (have_rows('modules')){
         the_row();
         
        //  echo "<script>console.log('" . json_encode( the_row()) . "');</script>";
        //  echo "<script>console.log('" . json_encode( get_row_layout()) . "');</script>";
   

          if(get_row_layout() == 'top_header_image')
        {
            //   echo "<script>console.log('" . json_encode( get_sub_field('page_values')['page_sub-title']) . "');</script>";
             $header_image = get_sub_field('top_header_with__image');
        }
        if(get_row_layout() == 'page_values_group')
        {
            //   echo "<script>console.log('" . json_encode( get_sub_field('page_values')['page_sub-title']) . "');</script>";
             $sub_caption = get_sub_field('page_values')['page_sub-title'];
             $check = get_sub_field('page_values')['check-if_it_is_parent_page'];
        }
         
       
       //get_template_part('templates/module', get_row_layout());
    }
}
//print_r($check);

if ($header_image['url'] != '') {  ?>
<div class="container-fluid custom_cont top_header_image" style='background-image: url("<?php echo $header_image['url']; ?>"); opacity: 1;'>
    <div class="spotlight_row">
    <div class="row">
        <div class="spotlight_body">
                <h1 class="spotlight_title"><?php echo the_title(); ?></h1>
                <?php if (isset($sub_caption)) { ?>
                <p class="spotlight_caption"><?php print_r($sub_caption); ?></p>
                <?php } ?>
        </div>
    </div>
    </div>
</div>
<?php }
if($header_image['url'] == '' && $check == 1){
?>

<div class="container title_con">
    <h1 class="spotlight_title"><?php echo the_title(); ?></h1>
    <?php if(isset($sub_caption)){ ?>
    <p class="spotlight_caption"><?php print_r($sub_caption); ?></p>
    <?php } ?>
</div>

<?php } echo do_shortcode( '[custom_notification]' ); 



?>

 <div class="container custom_contcls <?php if($header_image['url'] == '' && $check == 0){ ?>third_level_page <?php } ?>">
       <?php //$cat_id = (int) ;
    //$category = get_category($post->ID);
    $category = get_the_terms( $post->ID, 'news_category' ); 
    $cat = $category[0]->name;
    //print_r($category);  ?>
     <div class="row">
        <?php if($cat != '2017' && $cat != '2018'){ ?>
         <div class="col-sm-4 sidebar_menu sidebar_cell">

            <div class="sub_nav_header custom_childsidebar">
                <h2 class="sub_nav_title">
                <?php                 
                    // if ( 0 == $post->post_parent ) {
                    //     the_title();
                    // } else {
                    //     $parents = get_post_ancestors( $post->ID );
                    //     echo apply_filters( "the_title", get_the_title( end ( $parents ) ) );
                    // }
                    echo"Flying With Us";
                ?></h2>
            </div>
            <!-- <div class="sub_nav_wraper">
             <?php 
                // /*if(is_active_sidebar('home_left_1')){
                //     dynamic_sidebar('home_left_1');
                // } */

            //     $args = array(
            //                 'menu' => 'Press/Media Sidebar', //Name of menu you created in WP admin
            //                 'depth' => 4, //define how deep you'd like the menu 0,1,2,3 etc
            //                 //'items_wrap' => '<ul class="sidebar_menu">%3$s</ul>' 
            //                 'container_class' => 'press_media_sidebar'
            //             );
            //     wp_nav_menu($args);

            //     wp_nav_menu( array( 'theme_location' => '', 'container_class' => 'secondry_menu', 'menu' => 'Secondry Menu' ) );
            //  ?>
            </div> -->
            <div class="sub_nav_wraper">
    <?php
    // Display the "Press/Media Sidebar" menu before the custom post section
    wp_nav_menu(array(
        'theme_location' => '',
        'container_class' => 'press_media_sidebar', // Change the container class as needed
        'menu' => 'Press/Media Sidebar', // Use the menu name
    ));

    $args = array(
        'post_type' => 'press_media', 
        'posts_per_page' => 5, // Number of posts to display
        'order' => 'DESC', // You can change the order to 'ASC' if needed
    );

    $custom_query = new WP_Query($args);

    if ($custom_query->have_posts()) :
    ?>
        <ul class="press_media_sidebar menu">
            <?php while ($custom_query->have_posts()) : $custom_query->the_post(); ?>
                <li class="newmenu <?php if($currentUrlnew == get_permalink()) {echo "active";}else{echo "";} ?>"> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    <?php
        wp_reset_postdata(); // Reset post data
    else :
        // No posts found
        echo 'No posts found.';
    endif;

    // Display the "Press/Media Sidebar bottom" menu
    wp_nav_menu(array(
        'theme_location' => '',
        'container_class' => 'press_media_sidebar_bottom', // Change the container class as needed
        'menu' => 'Press/Media Sidebar bottom', // Use the new menu name
    ));

    // Display the "Secondry Menu"
    wp_nav_menu(array(
        'theme_location' => '',
        'container_class' => 'secondry_menu',
        'menu' => 'Secondry Menu',
    ));
    ?>
</div>



         </div>
         <?php } 
         $class = 'press_media';
         ?>
         <div class="col-sm-8 <?php echo ($cat != '2017' && $cat != '2018') ? '' : $class; ?>">
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

//  if (have_rows('modules')){
//             while (have_rows('modules')){
//                 the_row();
//                 get_template_part('templates/module', get_row_layout());
//             }
//         }
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

<?php get_footer(); 

function catName($cat_id) {
    $cat_id = (int) $cat_id;
    $category = &get_category($cat_id);
    return $category->name;
}


?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var headerElement = document.querySelector('.sub_nav_header');
  var titleElement = headerElement.querySelector('.sub_nav_title');
  headerElement.addEventListener('click', function() {
    // Toggle the "active-button" class
    titleElement.classList.toggle('.active-button');
    // Check if the "active-button" class is present and update the text accordingly
    if (titleElement.classList.contains('.active-button')) {
      titleElement.textContent = 'Close';
      console.log('Text changed to "Close"');
    } else {
      titleElement.textContent = 'Flying With Us';
      console.log('Text changed to "Flying With Us"');
    }
  });
});</script>