<?php 

/**

 * Theme functions and definitions.

 *

 * @link https://developer.wordpress.org/themes/basics/theme-functions/

 *

 * @package WordPress

 * @subpackage BWITheme

 * @since BWITheme 1.0

 */


// Exit if accessed directly

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//require get_template_directory() . '/inc/block-patterns.php';

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {

wp_enqueue_style( 'custom-svg-style', get_stylesheet_directory_uri() . '/assets/bwiairport_format.css' , null, '1.0.0');

//wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/custom.css' );
wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/custom.css',false,'1.0.0');


wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/innerpage.css', null, '1.0.0');

//wp_register_script( 'custom-script', get_stylesheet_directory_uri() . '/assets/custom.js' );
wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/1site_custom.js', array ( 'jquery' ), false);

}

add_action('wp_enqueue_scripts', function(){
    $manifestFile = get_template_directory() . '/dist/manifest.json';
    
    if(!file_exists($manifestFile)) return;

    $manifest = json_decode(file_get_contents($manifestFile));
    
    $manifest = [
        'jsFilename' => $manifest->js,
        'cssFilename' => $manifest->css,
    ];
    

    if(!isset($manifest['jsFilename'])) return;
    wp_enqueue_script( "bwi-theme-scripts", get_template_directory_uri() . "/dist/{$manifest['jsFilename']}", array(), '0.0.1', true );

    if(!isset($manifest['cssFilename'])) return;
    wp_enqueue_style( "bwi-theme-styles", get_template_directory_uri() . "/dist/{$manifest['cssFilename']}");
}, 10);

// Remove WP Version From Styles    

add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Remove WP Version From Scripts

add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );



// Function to remove version numbers

function sdt_remove_ver_css_js( $src ) {

    if ( strpos( $src, 'ver=' ) )

        $src = remove_query_arg( 'ver', $src );

    return $src;

}



add_action( 'after_setup_theme', 'theme_setup', 10 );



function theme_setup() {



		// Register navigation menus.

		register_nav_menus(

			array(

				'sec_menu' => esc_html__( 'Secondry Menu', 'bwiwp' ),

				'main_menu'   => esc_html__( 'Main', 'bwiwp' ),

				'footer_menu' => esc_html__( 'Footer', 'bwiwp' ),

				'mobile_menu' => esc_html__( 'Mobile (optional)', 'bwiwp' ),

			)

		);



	}



add_theme_support( 'post-thumbnails' );



/**

 * Register our sidebars and widgetized areas.

 *

 */

function arphabet_widgets_init() {



	register_sidebar( array(

		'name'          => 'Home left sidebar',

		'id'            => 'home_left_1',

		'before_widget' => '<div>',

		'after_widget'  => '</div>',

		'before_title'  => '<h2 class="rounded">',

		'after_title'   => '</h2>',

	) );

	

	register_sidebar( array(

		'name'          => 'Footer Widget 1',

		'id'            => 'footer_widget_1',

		'before_widget' => '<div>',

		'after_widget'  => '</div>',

		'before_title'  => '<h2 class="title">',

		'after_title'   => '</h2>',

	) );

	register_sidebar( array(

		'name'          => 'Footer Widget 2',

		'id'            => 'footer_widget_2',

		'before_widget' => '<div>',

		'after_widget'  => '</div>',

		'before_title'  => '<h2 class="title">',

		'after_title'   => '</h2>',

	) );

	register_sidebar( array(

		'name'          => 'Footer Widget 3',

		'id'            => 'footer_widget_3',

		'before_widget' => '<div>',

		'after_widget'  => '</div>',

		'before_title'  => '<h2 class="title">',

		'after_title'   => '</h2>',

	) );

	register_sidebar( array(

		'name'          => 'Footer Widget 4',

		'id'            => 'footer_widget_4',

		'before_widget' => '<div>',

		'after_widget'  => '</div>',

		'before_title'  => '<h2 class="title">',

		'after_title'   => '</h2>',

	) );



}

add_action( 'widgets_init', 'arphabet_widgets_init' );

	

add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {

  $filetype = wp_check_filetype( $filename, $mimes );

  return [

      'ext'             => $filetype['ext'],

      'type'            => $filetype['type'],

      'proper_filename' => $data['proper_filename']

  ];



}, 10, 4 );



function cc_mime_types( $mimes ){

  $mimes['svg'] = 'image/svg+xml';

  return $mimes;

}

add_filter( 'upload_mimes', 'cc_mime_types' );



function fix_svg() {

  echo '<style type="text/css">

        .attachment-266x266, .thumbnail img {

             width: 100% !important;

             height: auto !important;

        }

        </style>';

}

add_action( 'admin_head', 'fix_svg' );



// shortcode to get posts //

// function all_posts() {
//     $args = array(
//         'post_type' => 'post',
//         'post_status' => 'publish',
//         'tax_query' => array(
//             array(
//                 'taxonomy' => 'category',
//                 'field' => 'slug',
//                 'terms' => 'all-posts', 
//             ),
//         ),
//         'order' => 'DESC', 
//         'posts_per_page' => 3,
//     );

//     $loop = new WP_Query($args);

//     $returnedcontent = ''; // Initialize the variable to store the output

//     while ($loop->have_posts()) : $loop->the_post();

//         $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
//         $page_url = get_post_custom_values('page_link');
//         $page_text = get_post_custom_values('post_text');

//         $returnedcontent .= '<div class="posts_con col-sm-4">';

//         if ($feat_image != '') {
//             $returnedcontent .= '<div class="post_image1">';
//             $returnedcontent .= '<img src="' . $feat_image . '">';
//             $returnedcontent .= '</div>';
//         }

//         $returnedcontent .= '<div class="post_full_width">';
//         $returnedcontent .= '<div class="post_name">' . get_the_title() . '</div>';
//         $returnedcontent .= '<div class="post_main">' . get_the_content() . '</div>';
//         $returnedcontent .= '<a class="post_link" href="' . $page_url[0] . '"> ' . $page_text[0] . '<span class="material-symbols-outlined">east</span></a>';
//         $returnedcontent .= '</div>';
//         $returnedcontent .= '</div>';

//     endwhile;

//     wp_reset_postdata();

//     return $returnedcontent;
// }


// add_shortcode( 'all_posts', 'all_posts' );

function shapeSpace_recent_posts_shortcode($atts, $content = null) {
	
	global $post;
	
	extract(shortcode_atts(array(
		'cat'     => '',
		'num'     => '3',
		'order'   => 'DESC',
		'orderby' => 'post_date',
	), $atts));
	
	$args = array(
		'cat'            => $cat,
		'posts_per_page' => $num,
		'order'          => $order,
		'orderby'        => $orderby,
	);
	
	$returnedcontent = '';
	
	$posts = get_posts($args);
	
	foreach($posts as $post) {
		
		setup_postdata($post);
		
        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                $page_url = get_post_custom_values('page_link');
                $page_text = get_post_custom_values('post_text');
        
                $returnedcontent .= '<div class="posts_con col-sm-4">';
        
                if ($feat_image != '') {
                    $returnedcontent .= '<div class="post_image1">';
                    $returnedcontent .= '<img src="' . $feat_image . '">';
                    $returnedcontent .= '</div>';
                }
        
                $returnedcontent .= '<div class="post_full_width">';
                $returnedcontent .= '<div class="post_name">' . get_the_title() . '</div>';
                $returnedcontent .= '<div class="post_main">' . get_the_content() . '</div>';
                $returnedcontent .= '<a class="post_link" href="' . $page_url[0] . '"> ' . $page_text[0] . '<span class="material-symbols-outlined">east</span></a>';
                $returnedcontent .= '</div>';
                $returnedcontent .= '</div>';
        
		
	}
	
	wp_reset_postdata();
	
	return  $returnedcontent;
	
}
add_shortcode('recent_posts', 'shapeSpace_recent_posts_shortcode');




// shortcode to get posts end //

// function covid_page(){
//     $categories = get_the_category();
//     $category_id = $categories[2]->cat_ID;
//     $args = array(  

//         'post_type' => 'post',

//         'post_status' => 'publish',

//         'order' => 'DES',
//         //'categories' => 'covid-notification',
//         'tax_query' => array(
//             array (
//                 'taxonomy' => 'category',
//                 'field' => 'name',
//                 'terms' => 'COVID Notification',
//             )
//         ),
//         'posts_per_page' => 1

//     );

//     //$count = 0;

//     $loop = new WP_Query( $args ); 

//     while ( $loop->have_posts() ) : $loop->the_post(); 

//     $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

//     $page_url = get_post_custom_values('page_link');

//     //print_r($page_url);
//     $ret_content .= '<div class="posts_con covid col-sm-4">';

//     $ret_content .= '<div class="post_image1">';

//     $ret_content .= '<img src="'.$image.'">';

//     $ret_content .= '</div>';

//     $ret_content .= '<div class="post_full_width">';

//     $ret_content .= '<div class="post_name">'.get_the_title().'</div>';

//     $ret_content .= '<div class="post_main">'.get_the_content().'</div>';

//     $ret_content .= '<a class="post_link" href="'.$page_url[0].'" >COVID-19 health information<span class="material-symbols-outlined">east</span></a>';

//     $ret_content .= '</div>';

//     $ret_content .= '</div>';
//     endwhile;

//     wp_reset_postdata();

//     return $ret_content;
// }
// add_shortcode( 'covid_page', 'covid_page' );

function get_hud(){
    ob_start();
        include __DIR__ . '/templates/hud.php';
    return ob_get_clean();
}
add_shortcode( 'get_hud', 'get_hud' );

function the_breadcrumb() {
    global $post;
    echo '<div class="bread_chrums_wrap" id="main_content_scroll">';
    echo '<div class="bread_chrums">';
    if (!is_home()) {
        echo '<a class="bread_crums home" href="'.home_url().'" rel="nofollow"><svg class="symbol symbol_home symbol_dark"><use xlink:href="#home"></use></svg>Home</a>';
        //echo '</li><li class="separator"> / </li>';
        echo '<span class="bre_saparator"></span>';
        if (is_category() || is_single()) {
            the_category(' <span class="bre_saparator"></span> ');
            if (is_single()) {
                // $ance = get_post_ancestors( $post->ID );
                // foreach ( array_reverse($ance) as $ancestors ) {
                //     $output1 = '<a class="bread_crums" href="'.get_permalink($ancestors).'" title="'.get_the_title($ancestors).'">'.get_the_title($ancestors).'</a> <span class="bre_saparator"></span>';
                //     echo $output1;
                // }
                // echo '<span class="bread_crums active sa">';
                // echo the_title();
                // echo '</span>';


                // test code
                    $post_type = get_post_type($post);
                    $post_type_object = get_post_type_object($post_type);

                    // Display post type archive link
                    // if ($post_type_object->has_archive) {
                    // //    echo ' &raquo; <a class="bread_crums" href="' . get_post_type_archive_link($post_type) . $post_type_object->labels->name . '</a>';
                    //     if($post_type_object->labels->name == 'Leaders')
                    //          $post_type_object->labels->name = 'Airport Leadership';
                    //     if($post_type == 'press_media')
                    //     {
                           
                    //         echo '<a class="bread_crums" href="/flying-with-us/" title="Flying With Us">Flying With Us</a>';
                    //         echo '<span class="bre_saparator"></span>';
                    //         echo '<a class="bread_crums" href="/flying-with-us/about-bwi/" title="About BWI">About BWI</a>';
                    //         echo '<span class="bre_saparator"></span>';
                            
                    //     }
                        
                    //     echo '<a class=" bre_saparator bread_crums test1" href="/flying-with-us/about-bwi/press-media/">' . $post_type_object->labels->name . '</a>';
                    // }

                    if ($post_type_object->has_archive) {
                        if ($post_type_object->labels->name == 'Leaders') {
                            $post_type_object->labels->name = 'Airport Leadership';
                        }
                        
                        // Check if the post type is 'press_media' and set the link accordingly
                       
                        if($post_type == 'press_media'){
                        
                        echo '<a class="bread_crums" href="/flying-with-us/" title="Flying With Us">Flying With Us</a>';
                        echo '<span class="bre_saparator"></span>';
                        echo '<a class="bread_crums" href="/flying-with-us/about-bwi/" title="About BWI">About BWI</a>';
                        echo '<span class="bre_saparator"></span>';
                    }
                        if ($post_type == 'press_media') {
                            echo '<a class="bread_crums" href="/flying-with-us/about-bwi/press-media/" title="Press Media">Press / Media</a>';
                        } else {
                            echo '<a class="bread_crums" href="/leadership/" title="Airport Leadership">Airport Leadership</a>';
                        }
                    }
                    
                    


                    // Display post type taxonomy if applicable
                    $taxonomy = '';
                    $taxonomies = get_object_taxonomies($post_type, 'objects');
                    if (!empty($taxonomies)) {
                        foreach ($taxonomies as $tax) {

                      if ($tax->hierarchical) {
                                $taxonomy = $tax->name;
                                break;
                            }
                        }
                    }
                    
                    if ($taxonomy !== '' && $post_type !== 'press_media') { //remove year from archive media page
                        $terms = wp_get_post_terms($post->ID, $taxonomy);
                        if (!empty($terms)) {
                            $term = $terms[0];
                            //echo ' &raquo; <a href="' . get_term_link($term->term_id, $taxonomy) . '">' . $term->name . '</a>';

                            echo '<a  href="' . get_term_link($term->term_id, $taxonomy) . '">' . $term->name . '</a>';
                        }
                    }
                    
                    echo '<span class="bre_saparator"></span>' . get_the_title($post->ID);
                //End test code


            }
        } elseif (is_page()) {
            if($post->post_parent){
                //print_r($post->post_parent);
                //print_r('</br>'.get_post_ancestors( $post->ID ));
                $anc = get_post_ancestors( $post->ID );
                $title = get_the_title();
                if($title == 'Security')
                    $title = 'Security / TSA Guidelines';
                foreach ( array_reverse($anc) as $ancestor ) {
                    //print_r($ancestor.'///');
                     $ancestorTitleForBreadCrumb = get_the_title($ancestor);
                    if($ancestorTitleForBreadCrumb != 'Security')
                    {  $output = '<a class="bread_crums" href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a> <span class="bre_saparator"></span>';
                        echo $output;
                    }
                }
                
                echo '<span class="bread_crums active" title="'.$title.'"> '.$title.'</span>';
            } else {
                echo '<span class="bread_crums active"> '.get_the_title().'</span>';
            }
        }
        elseif (is_search()) { 
            echo '<span class="bread_crums active"> Search</span>'; 
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo '<span class="bread_crums active"> Search</span>';}
   
    //echo '</ul>';
    echo '</div>';
    echo '</div>';

}



    add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

    function special_nav_class ($classes, $item) {
        if (in_array('current-menu-item', $classes) ){
            $classes[] = 'active ';
        }
        return $classes;
    }


function leaders() {
    $labels = array(
        'name'               => _x( 'Leaders', 'post type general name' ),
        'singular_name'      => _x( 'Leaders', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'leader' ),
        'add_new_item'       => __( 'Add New Leader' ),
        'edit_item'          => __( 'Edit Leader' ),
        'new_item'           => __( 'New Leader' ),
        'all_items'          => __( 'All Leaders' ),
        'view_item'          => __( 'View Leaders' ),
        'search_items'       => __( 'Search Leaders' ),
        'not_found'          => __( 'No leaders found' ),
        'not_found_in_trash' => __( 'No leaders found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Leadership'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'leadership' ), // Set the custom slug
    );
    register_post_type( 'leaders', $args );
}
add_action( 'init', 'leaders' );

function my_taxonomies_leaders() {
    $labels = array(
        'name'              => _x( 'Leaders Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Leaders Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Leaders Categories' ),
        'all_items'         => __( 'All Leaders Categories' ),
        'parent_item'       => __( 'Parent Leader Category' ),
        'parent_item_colon' => __( 'Parent Leader Category:' ),
        'edit_item'         => __( 'Edit Leader Category' ),
        'update_item'       => __( 'Update Leader Category' ),
        'add_new_item'      => __( 'Add New Leader Category' ),
        'new_item_name'     => __( 'New Leader Category' ),
        'menu_name'         => __( 'Leaders Categories' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'news_category', 'leadership', $args );
}
add_action( 'init', 'my_taxonomies_leaders', 0 );

function all_leaders(){
    $args = array(  

        'post_type' => 'leaders',

        'post_status' => 'publish',

        'order' => 'ASC',

        'posts_per_page' => -1

    );

    //$count = 0;

    $loop = new WP_Query( $args ); 
    $returnedcontent .= '<div class="leaders_con">';
    while ( $loop->have_posts() ) : $loop->the_post(); 

    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
    //$test = get_the_post_thumbnail();
    //print_r($test);
    $alt_text = get_post_meta(get_post_thumbnail_id($post->ID) , '_wp_attachment_image_alt', true);
    //print_r('alt text is: '. $alt_text);
    //if($count % 3 == 0 ){ $returnedcontent .= '<div class="venue_chunck load_wra_img2">'; }

    $returnedcontent .= '<div class="leader">';

    $returnedcontent .= '<div class="post_image1">';
    if(get_the_content() != ''){
        $returnedcontent .= '<a href="'.get_permalink().'">';
    }
    if($alt_text != ''){
        $alt_text = $alt_text;
    }else{
    $alt_text = get_post_meta( get_the_ID(), 'name', true);
    }
    $returnedcontent .= '<img src="'.$feat_image.'" alt="'.$alt_text.'">';
    if(get_the_content() != ''){
        $returnedcontent .= '</a>';
    }
    $returnedcontent .= '</div>';

    $returnedcontent .= '<div class="post_full_width">';

    $returnedcontent .= '<div class="leader_name">'.get_post_meta( get_the_ID(), 'name', true).'</div>';

    $returnedcontent .= '<div class="leader_position">'.get_post_meta( get_the_ID(), 'position', true).'</div>';

    $returnedcontent .= '</div>';
    $returnedcontent .= '</div>';
    
    endwhile;
    $returnedcontent .= '</div>';
 wp_reset_postdata();

    return $returnedcontent;
}

add_shortcode( 'all_leaders', 'all_leaders' );

// Custom post type Press / Media  start /////
function press_media() {
    $labels = array(
        'name'               => _x( 'Press/Media', 'post type general name' ),
        'singular_name'      => _x( 'Press/Media', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'Press/Media' ),
        'add_new_item'       => __( 'Add New Press/Media' ),
        'edit_item'          => __( 'Edit Press/Media' ),
        'new_item'           => __( 'New Press/Media' ),
        'all_items'          => __( 'All Press/Media' ),
        'view_item'          => __( 'View Press/Media' ),
        'search_items'       => __( 'Search Press/Media' ),
        'not_found'          => __( 'No leaders found' ),
        'not_found_in_trash' => __( 'No leaders found in the Trash' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Press / Media'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => '',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'has_archive'   => true,
        
    );
    register_post_type( 'press_media', $args );
}
add_action( 'init', 'press_media' );

function my_taxonomies_press_media() {
    $labels = array(
        'name'              => _x( 'Press/Media Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Press/Media Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Press/Media Categories' ),
        'all_items'         => __( 'All Press/Media Categories' ),
        'parent_item'       => __( 'Parent Press/Media Category' ),
        'parent_item_colon' => __( 'Parent Press/Media Category:' ),
        'edit_item'         => __( 'Edit Press/Media Category' ),
        'update_item'       => __( 'Update Press/Media Category' ),
        'add_new_item'      => __( 'Add New Press/Media Category' ),
        'new_item_name'     => __( 'New Press/Media Category' ),
        'menu_name'         => __( 'Press/Media Categories' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
    );
    register_taxonomy( 'news_category', 'press_media', $args );
}

add_action( 'init', 'my_taxonomies_press_media', 0 );

// Custom post type Press / Media  end /////

function all_press_media($catagory){
    $args = array(  
        'post_type' => 'press_media',
        'post_status' => 'publish',
        'order' => 'DESC', // Set the order to DESC for descending order
        'orderby' => 'date',
        'tax_query' => array(
            array (
                'taxonomy' => 'news_category',
                'field' => 'name',
                'terms' => $catagory,
            )
        ),
        'posts_per_page' => -1

    );

    //$count = 0;

    $loop = new WP_Query( $args ); 
    //print_r($loop);
    $returnedcontent .= '<h6 class="press_media_links">';
    while ( $loop->have_posts() ) : $loop->the_post(); 
        //echo get_the_title();
    //$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );

        // $returnedcontent .= '<a href="'.get_permalink().'">'.get_the_title().'</a></br>';
        $returnedcontent .= '<a href="'.get_permalink().'">'.get_the_title().'</a></br>';
    
    endwhile;
    $returnedcontent .= '</h6>';
 wp_reset_postdata();

    return $returnedcontent;
}

add_shortcode( 'all_press_media', 'all_press_media' );

function ur_theme_start_session()
{
    if (!session_id())
        session_start();
}
//start session on the earliest hook, avoid headers sent error
add_action("muplugins_loaded", "ur_theme_start_session", 1);


//  function test() {
//         wp_cache_set( 'hello', 'world' );
//     }
// add_action( 'init', 'test' );

function client_screen_width( $screen_width='' ) 
{
     // add_option( 'screen_width',  'value' );
     // return;
}
add_action( 'init', 'client_screen_width' );
//client_screen_width( 'telephone' );
function add_the_table_button( $buttons ) {
    array_push( $buttons, 'separator', 'table' );
    return $buttons;
}
add_filter( 'mce_buttons', 'add_the_table_button' );

function add_the_table_plugin( $plugins ) {
      $plugins['table'] = content_url() . '/tinymce-plugins/table/plugin.min.js';
      return $plugins;
}
add_filter( 'mce_external_plugins', 'add_the_table_plugin' );

// function BwiGetCrossenvParkingData(){
//     $dest = get_template_directory() . "/cache/parking-xml/";
//     $liveDir = "https://bwiairport.com/wp-content/themes/bwitheme/cache/parking-xml/";
	
// 	$files = [
// 		"Hourly" => "hourly.xml",
// 		"Daily" => "daily.xml",
// 		"Express" => "express.xml",
// 		"Long-Term A" => "long-term.xml",
// 		"Long-Term B" => "long-termb.xml"
// 	];

//     array_map(function($file) use ($liveDir, $dest){
//         $url = $liveDir . $file;

//         $curl = curl_init($url);
//         curl_setopt($curl, CURLOPT_URL, $url);
//         curl_setopt($curl, CURLOPT_HEADER, false);
//         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//         $response = curl_exec($curl);
//         curl_close($curl);

//         file_put_contents($dest . $file, $response);
//     }, $files);
// }
// BwiGetCrossenvParkingData();