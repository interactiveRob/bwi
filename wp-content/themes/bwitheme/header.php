<html>

<head>
<title><?php wp_title( '&#124;', true, 'right' ); ?> BWI Airport</title>

<link rel="icon" type="image/x-icon" href="/wp-content/uploads/2022/04/logo1-1.png">

<meta name='robots' content='max-image-preview:large' />

<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="abstract" content="BWI Marshall is Your Gateway to the Baltimore-Washington Region!" />
<meta name="keywords" content="airport, baltimore, washington dc, bwi, thurgood marshall, international" />
<meta name="MobileOptimized" content="width" />
<meta name="HandheldFriendly" content="true" />
<meta name="twitter:site" content="@BWI_Airport" />
<meta name="twitter:creator" content="@BWI_Aiport" />
<meta http-equiv="Permissions-Policy" content="ch-ua-form-factor">
<?php 
global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) );
 ?>
<meta name="twitter:url" content="<?php echo $current_url; ?>" />

<?php wp_head(); ?>

<link rel="stylesheet" href="https://use.typekit.net/wfz8nuy.css">

<link rel='dns-prefetch' href='//js.hs-scripts.com' />
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/assets/js/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'/assets/js/bootstrap.js'; ?>"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri().'//assets/js/DataTables/js/jquery.dataTables.min.js'; ?>"></script>
<script src="https://use.typekit.net/yvv5nyp.js"></script>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/assets/bootstrap.css'; ?>">

<link rel='stylesheet' id='google-fonts-1-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CRoboto+Slab%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CMontserrat%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2C400%2C400italic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic&#038;display=auto&#038;ver=5.9.3' media='all' />

<link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?ver=2.0.0">

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KHNKTJ6');</script>
<!-- End Google Tag Manager -->

</head>

<?php

/*header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');

header('Cache-Control: no-store, no-cache, must-revalidate');

header('Cache-Control: post-check=0, pre-check=0', FALSE);

header('Pragma: no-cache');*/



?>

<script>

</script>

<body <?php body_class(); ?>>
<?php include 'inc/header_svgs.php'; ?>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KHNKTJ6"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


<style>
.bannerBgImage{
	    background-image: url(/wp-content/uploads/2022/04/logo.svg);
    height: 50px;
    display: block;
    background-size: contain;
    background-repeat: no-repeat;
	min-width: 330px;
}





</style>

<div id="header" class="header container-fluid fixed-top">

<div class="row">

    <div class="col-sm-3 logo">

        <div class="icon"><a class="bannerBgImage" href="<?php echo site_url(); ?>"><!--<img src="/wp-content/uploads/2022/04/logo.svg" class="icon">--></a></div>

    </div>

    <div class="col-sm-6  menu_desktop">

        <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_class' => 'main_menu' ) ); ?>

    </div>

    <div class="col-sm-3 menu_desktop search">
    	
         <script type="text/javascript">
         	//  var screenWidth = "screen_width=" + screen.width;  
	         // document.cookie=screenWidth;
	         // console.log(screenWidth);
	         //var test = <?php //add_option( 'screen_width', 'value3' );?>
        </script>
        <?php wp_nav_menu( array( 'theme_location' => 'sec_menu', 'container_class' => 'secondry_menu', 'area-lable' => 'Site Navigation' ) ); ?>
        
        <?php 
          echo do_shortcode('[google-translator]'); 
         //  $screenWidth = (int) $_COOKIE['screen_width'];  
         //  // $filePth = get_site_url()."/wp-content/themes/bwitheme/test.php"; 
         //  // echo "<script>console.log('file Path " . $filePth . "');</script>";
         //    require  "test.php";    
         //    global $wpdb;
	        // $data = array();
	        
	        // $sql = "SELECT * FROM wp_screen_options";
	        // $data = $wpdb->get_results($sql);
	        // if(count($data) > 0)
	        // {
	        // 	$screenOptions = $data[0];
         //        $screenWidth2 = (int) $screenOptions->option_value;
	        // }else $screenWidth2 = 0;
	        

         //  //$screenOptions = getScreenSizeOption(true);
         // $GLOBALS['wp_object_cache']->delete( 'screen_width', 'options' );
         //  $screenWidth2 = (int) get_option('screen_width') ;
         //   echo "<script>console.log('screenWidthOptions: " . json_encode($screenWidth2) . "');</script>";

         //  if($screenWidth >= 980 || $screenWidth2 >= 980 )
         //  {
         //  	 echo "<script>console.log('Desktop screen setting execute for " . $screenWidth . "px screen. ". $screenWidth2. " .');</script>";
         //     echo do_shortcode('[google-translator]'); 
         //  }else echo "<script>console.log('Desktop screen setting are not executing for " . $screenWidth . "px screen. ". $screenWidth2. " .');</script>";
        ?>
        <div class="oc_btn desktop-menu" aria-label="search">

            <!--<svg><use href="/bwiairport/wp-content/uploads/2022/04/search_black_24dp.svg" class="open" style="fill: #DA1A32;"></use></svg>

            <svg><use href="/bwiairport/wp-content/uploads/2022/04/close_black_24dp.svg" class="close" style="fill: #DA1A32;"></use></svg>-->

            <!--<img class="open" src="/bwiairport/wp-content/uploads/2022/04/search_black_24dp.svg">-->
            <span class="site_search_handle_scope open">
            <svg aria-hidden="true" class="symbol symbol_search symbol_red">
              <use xlink:href="#search"></use>
            </svg>
          </span>

            <!--<img class="close" src="/bwiairport/wp-content/uploads/2022/04/close_black_24dp.svg">-->

            <span class="site_search_handle_close close">
            <svg aria-hidden="true" class="symbol symbol_close symbol_black">
              <use xlink:href="#close"></use>
            </svg>
          </span>

        </div>

        <div class="header_search site_search_lg">

            <?php get_search_form(  ); ?>

        </div>

    </div>
    <div class="col-sm-1 mobile_menu">
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">


            <span class="hum_title">Menu</span>
            <!--<span class="material-symbols-outlined">menu</span>-->
            <span class="mobile_sidebar_handle_icon"></span>
        </a>
        <div id="myLinks">
          <div class="search_mobile">
            <?php get_search_form(  ); ?>
          </div>

            <?php if(is_active_sidebar('footer_widget_4')){  dynamic_sidebar('footer_widget_4');  }  ?>

            <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_class' => 'main_menu' ) ); ?>

             <div id="mobile-lang-switch-wrapper">
           
            <?php wp_nav_menu( array( 'theme_location' => 'sec_menu', 'container_class' => 'secondry_menu' ) );  ?>
            
           
             <!---------test--------->
             
            <?php 
               // $screenWidth = (int) $_COOKIE['screen_width']; 
               // $screenWidth2 = (int) get_option('screen_width') ;  
               // if($screenWidth < 980 && $screenWidth2 < 980)
               // {
               //    	echo "<script>console.log('Mobile screen setting execute for " . $screenWidth . "px screen');</script>";
               //      echo do_shortcode("[google-translator]"); 
               //  }else echo "<script>console.log('Mobile screen setting are not executing for " . $screenWidth . "px screen');</script>";

            ?>
           

            <!-------test---------->
             </div>
            <div class="foo_mobilemenu foo_helpfull_links">

              <h2 class="foo_heading111">HELPFUL LINKS</h2>
              <?php wp_nav_menu( array( 'theme_location' => '', 'container_class' => 'mobile_footer_menu', 'menu' => 'Footer Menu' ) ); ?>

            </div>
        </div>
    </div>
</div>



</div>

<div class="main_con">

<?php

//echo $current_url;
//print_r($current_slug); ?>
