<?php
/**
 * The Search template file
 *
 */

get_header();
?>
<div class="container-fluid custom_cont search_results">
    <div class="row">
        <div class="search_content_cell">
            <div class="page_header">
                <div class="typography">
                    <h1 class="page_title_alternate">Search</h1>
                </div>
                <div class="bread_chrums"><?php the_breadcrumb(); //get_breadcrumb(); ?></div>
            </div>
            <div class="search_body">
                <div class="search_form"><?php get_search_form(  ); ?></div>
                <div class="gsc-expansionArea">
                    <?php //print_r(count(have_posts()));
                        global $wp_query;
                         ?>
                    <div class="gsc-result-info" id="resInfo-0">About <?php echo $wp_query->found_posts; ?> results <span id="load_time"></span></div>
                    
                    <?php if ( have_posts() ): ?>
                <?php while( have_posts() ): ?>
                    <?php the_post(); ?>
                    <div class="search-result gsc-webResult gsc-result">
                        <div class="search_title"><a href="<?php the_permalink(); ?>" class="title"><h2 class="cut-text"><?php the_title(); ?> </h2></a></div>
                        <div class="img_detail">
                            <?php $thumb = the_post_thumbnail(); ?>
                            <div class="sdetail"><?php the_excerpt(); ?></div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <div class="search_pagination"><?php the_posts_pagination(); ?></div>
                    <div class="gcsc-more-maybe-branding-root"><a href="https://www.google.com/search?client=ms-google-coop&amp;q=bwi&amp;cx=018359456959023193468:dwty57two9q" target="_blank"><div class="gcsc-find-more-on-google"><svg width="12" height="12" viewBox="0 0 13 13" class="gcsc-find-more-on-google-magnifier"><title>search</title><path d="m4.8495 7.8226c0.82666 0 1.5262-0.29146 2.0985-0.87438 0.57232-0.58292 0.86378-1.2877 0.87438-2.1144 0.010599-0.82666-0.28086-1.5262-0.87438-2.0985-0.59352-0.57232-1.293-0.86378-2.0985-0.87438-0.8055-0.010599-1.5103 0.28086-2.1144 0.87438-0.60414 0.59352-0.8956 1.293-0.87438 2.0985 0.021197 0.8055 0.31266 1.5103 0.87438 2.1144 0.56172 0.60414 1.2665 0.8956 2.1144 0.87438zm4.4695 0.2115 3.681 3.6819-1.259 1.284-3.6817-3.7 0.0019784-0.69479-0.090043-0.098846c-0.87973 0.76087-1.92 1.1413-3.1207 1.1413-1.3553 0-2.5025-0.46363-3.4417-1.3909s-1.4088-2.0686-1.4088-3.4239c0-1.3553 0.4696-2.4966 1.4088-3.4239 0.9392-0.92727 2.0864-1.3969 3.4417-1.4088 1.3553-0.011889 2.4906 0.45771 3.406 1.4088 0.9154 0.95107 1.379 2.0924 1.3909 3.4239 0 1.2126-0.38043 2.2588-1.1413 3.1385l0.098834 0.090049z"></path></svg><span class="gcsc-find-more-on-google-text">Search for </span><span class="gcsc-find-more-on-google-query"><?php echo ' '.get_search_query().' '; ?></span><span class="gcsc-find-more-on-google-text"> on Google</span></div></a><div class="gcsc-find-more-on-google-branding"><div class="gcsc-branding" role="contentinfo" aria-label="Google Custom Search Branding"><a href="https://cse.google.com/?ref=b&amp;hl=en" target="_BLANK" class="gcsc-branding-clickable"><img src="https://www.google.com/cse/static/images/1x/en/branding.png" class="gcsc-branding-img-noclear" srcset="https://www.google.com/cse/static/images/2x/en/branding.png 2x" alt="enhanced by Google"></a></div></div></div>
            <?php else: ?>
                <p><?php _e( 'No Search Results found', 'nd_dosth' ); ?></p>
            <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>

<script type="text/javascript">
    jQuery( document ).ready(function() {
        jQuery( '<span class="bread_crums active" title="Parking"> Search</span>' ).insertBefore( '.breadcrumb-bottom-border' );
    });

    var beforeload = (new Date()).getTime();

function getPageLoadTime() {
  //calculate the current time in afterload
  var afterload = (new Date()).getTime();
  // now use the beforeload and afterload to calculate the seconds
  seconds = (afterload - beforeload) / 1000;
  // Place the seconds in the innerHTML to show the results
  $("#load_time").text('('+seconds + ' seconds)');
}

window.onload = getPageLoadTime;

</script>