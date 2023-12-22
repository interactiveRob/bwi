<?php
/*

*

Template Name: No Sidebar Template

*/
get_header(); 

//global $post;

$header_image = get_field('top_header_with_image');
$page_capton = get_field('page_values');
$sub_caption = $page_capton['page_sub-title'];
$check = $page_capton['check_if_it_is_parent_page'];
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
         <div class="col-sm-8 no_sidebar">
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
                get_template_part('templates/module', get_row_layout());
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