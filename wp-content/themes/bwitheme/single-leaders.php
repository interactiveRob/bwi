<?php 
get_header();
?>

<?php 
$skip_content_btn = get_field('show_hide_skip_to_main_content');

if ($skip_content_btn == '1') { ?>
    <div class="skip_content_btn">
        <a href="#main_content_scroll" class="plan_link"><span>Skip to Main Content</span><svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg></a>
    </div>
<?php }

echo do_shortcode( '[custom_notification]' );?>

 <div class="container">

     <div class="row">

         <div class="col-sm-8 leader_content_cell custom_container">
            <?php the_breadcrumb(); //get_breadcrumb(); ?>
            <div class="typography">
                <?php if($header_image['url'] == '' && $check == ''){ ?>
                <h2 class="page_title" id="page_title"><span><?php echo the_title(); ?></span>
                </h2>
                <?php }
                 echo the_content(); 
             //print_r($sec_img_right);
                 if (strpos($_SERVER['REQUEST_URI'], "leaders") !== false){
                    // car found
                    
                ?> 
 <?php }
             ?>
            </div>
             
         </div>
     </div>

 </div>
<script type="text/javascript">
	jQuery(document).ready(function(){
        if (window.location.href.indexOf("leaders") > -1) {
          jQuery('<a class="bread_crums" href="/leadership/" title="Airport Leadership">Airport Leadership</a>').insertBefore('span.single.bre_saparator');
        }
		
	});
</script>
<?php get_footer(); ?>