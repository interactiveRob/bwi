<?php


/*
    *
    Template Name: Flights
    */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/');
}
get_header();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Access-Control-Allow-Origin: *");
?>

<?php echo do_shortcode('[custom_notification]'); ?>


<div class="container flights_con ">

  <div class="row">

    <!------addd------>
    <div class="col-sm-4 sidebar_menu sidebar_cell">

      <div class="sub_nav_header custom_childsidebar">
        <h2 class="sub_nav_title">
          <span class="close">Close</span>
          <span class="title">
            <?php
            //echo the_title();               
            if (0 == $post->post_parent) {
              if ($mobile_sidebar_title != '') {
                echo $mobile_sidebar_title;
              } else {
                the_title();
              }
            } else {
              $parents = get_post_ancestors($post->ID);
              echo apply_filters("the_title", get_the_title(end($parents)));
            }
            ?></span>
        </h2>
      </div>
      <div class="sub_nav_wraper">
        <?php
        if (is_active_sidebar('home_left_1')) {
          dynamic_sidebar('home_left_1');
        }

        /*$args = array(
                            'menu' => 'Main Menu', //Name of menu you created in WP admin
                            'depth' => 4, //define how deep you'd like the menu 0,1,2,3 etc
                            'items_wrap' => '<ul class="sidebar_menu">%3$s</ul>' 
                        );
                wp_nav_menu($args);*/

        wp_nav_menu(array('theme_location' => '', 'container_class' => 'secondry_menu', 'menu' => 'Secondry Menu'));
        ?>
      </div>
    </div>
    <!------added----->

    <div class="col-sm-12 col-md-12 col-lg-12 ">
      <div class="custom_flight">
        <?php
        the_breadcrumb();
        ?>
      </div>

      <div class="row">
        <div class="col-sm-12 col-md-8 col-lg-8 flights_explore_1">
          <h1 class="spotlight_title"><?php echo the_title(); ?></h1>
          <?php
          echo the_content();
          ?>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 flights_explore_2" style="/*display:flex !important;justify-content:center !important;*/">
          <nav class="flight_search_explore">
            <span class="flight_search_explore_label">Explore This Section:</span>

            <ul class="flight_search_explore_list">
              <li class="flight_search_explore_item">
                <a class="flight_search_explore_link" href="/flying-with-us/flights/airlines">
                  <span>Airlines</span>
                  <svg class="symbol symbol_arrow_right symbol_gray">
                    <use xlink:href="#arrow_right"></use>
                  </svg>
                </a>
              </li>
              <li class="flight_search_explore_item">
                <a class="flight_search_explore_link" href="/flying-with-us/flights/air-traffic-map">
                  <span>Air Traffic Map</span>
                  <svg class="symbol symbol_arrow_right symbol_gray">
                    <use xlink:href="#arrow_right"></use>
                  </svg>
                </a>
              </li>
              <li class="flight_search_explore_item">
                <a class="flight_search_explore_link" href="/flying-with-us/flights/bwi-route-map">
                  <span>BWI Route Map</span>
                  <svg class="symbol symbol_arrow_right symbol_gray">
                    <use xlink:href="#arrow_right"></use>
                  </svg>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>

      <section class="schedule" id="schedule">
        <div class="row">
          <div class="schedule_body">
            <div class="schedule_switches">
              <button class="js-swap schedule_switch fs-swap-element fs-swap-enabled <?php if ((isset($pagename) && $pagename == "arrival") || (isset($_GET['hud_arrival_depature']) && $_GET['hud_arrival_depature'] == 'arrival')) {
                                                                                        echo "fs-swap-active";
                                                                                      } elseif ($pagename == "departure" || (isset($_GET['hud_arrival_depature']) && $_GET['hud_arrival_depature'] == 'departure')) {
                                                                                        echo "";
                                                                                      } else {
                                                                                        echo "fs-swap-active";
                                                                                      } ?>" data-swap-group="schedule_switch" data-swap-target=".schedule_section_1" data-swap-options="{&quot;collapse&quot;: false}" data-swap-active="true">Arrivals</button>
              <button class="js-swap schedule_switch fs-swap-element fs-swap-enabled <?php if ((isset($pagename) && $pagename == "departure") || (isset($_GET['hud_arrival_depature']) && $_GET['hud_arrival_depature'] == 'departure')) {
                                                                                        echo "fs-swap-active";
                                                                                      } ?>" data-swap-group="schedule_switch" data-swap-target=".schedule_section_2" data-swap-options="{&quot;collapse&quot;: false}">Departures</button>
            </div>

            <div class="fs-dropdown_wrapper schedule_dropdown_wrapper">
              <div class="fs-dropdown fs-light " id="fs-dropdown__0-dropdown" tabindex="0" role="listbox" aria-haspopup="true" aria-live="polite" aria-labelledby="fs-dropdown__0-dropdown-selected">

                <select class="js-dropdown schedule_dropdown fs-dropdown-element" tabindex="-1" aria-hidden="true">
                  <option value="1">Arrivals</option>
                  <option value="2">Departures</option>
                </select>

                <button type="button" class="fs-dropdown-selected" id="fs-dropdown__0-dropdown-selected" tabindex="-1">Arrivals</button>
                <div class="fs-dropdown-options fs-scrollbar-element fs-scrollbar fs-light">
                  <div class="fs-scrollbar-bar" style="height: 88.7812px;">
                    <div class="fs-scrollbar-track fs-touch-element" style="touch-action: pan-x; height: 88.7812px; margin-bottom: 0px; margin-top: 0px;">
                      <button type="button" class="fs-scrollbar-handle" aria-hidden="true" tabindex="-1" style="height: 102.365px; top: -13.5838px;"></button>
                    </div>
                  </div>
                  <div class="fs-scrollbar-content"><button type="button" class="fs-dropdown-item fs-dropdown-item_selected" data-value="1" role="option" aria-selected="true">Arrivals</button><button type="button" class="fs-dropdown-item" data-value="2" role="option">Departures</button></div>
                </div>
              </div>
              <span class="fs-dropdown_icon schedule_dropdown_icon">
                <svg class="symbol symbol_caret_down symbol_red">
                  <use xlink:href="#caret_down"></use>
                </svg>
              </span>
            </div>



            <div class="schedule_airline_switcher type_airline">
              <!-- <select class="schedule_airline_switcher_select"><option value="Select an Airline">Select an Airline</option><option value="Air Senegal">Air Senegal</option><option value="Alaska">Alaska</option><option value="American">American</option><option value="Boutique Air">Boutique Air</option><option value="Contour Airlines">Contour Airlines</option><option value="Delta">Delta</option><option value="Frontier">Frontier</option><option value="Southwest">Southwest</option><option value="Spirit Airlines">Spirit Airlines</option><option value="United">United</option></select> -->
              <select class="schedule_airline_switcher_select" onchange="filterByAirline(this.value,1)">
                <option value="Select an Airline">Select an Airline</option>
                <option value="Air Canada">Air Canada</option>
                <option value="Alaska">Alaska</option>
                <option value="American">American</option>
                <option value="Avelo">Avelo</option>
                <option value="British Airways">British Airways</option>
                <option value="Condor">Condor</option>
                <option value="Contour Airlines">Contour Airlines</option>
                <option value="Delta">Delta</option>
                <option value="Frontier">Frontier</option>
                <option value="Icelandair">Icelandair</option>
                <option value="JetBlue">JetBlue</option>
                <option value="PLAY">PLAY</option>
                <option value="Southwest">Southwest</option>
                <option value="Spirit Airlines">Spirit Airlines</option>
                <option value="Sun Country">Sun Country</option>
                <option value="United">United</option>
              </select>
            </div>

            <div class="schedule_section schedule_section_1 fs-swap-target fs-swap-enabled <?php if ((isset($pagename) && $pagename == "arrival") || (isset($_GET['hud_arrival_depature']) && $_GET['hud_arrival_depature'] == 'arrival')) {
                                                                                              echo "fs-swap-active";
                                                                                            } elseif ($pagename == "departure" || (isset($_GET['hud_arrival_depature']) && $_GET['hud_arrival_depature'] == 'departure')) {
                                                                                              echo "";
                                                                                            } else {
                                                                                              echo "fs-swap-active";
                                                                                            } ?>">
              <div class="schedule_list">
                <div class="responsive_table">
                  <table class="schedule_table schedule_table_lg" id="schedule_table_1" style="margin:unset !important;width:100% !important;">
                    <thead>
                      <tr class="schedule_header_row">
                        <!--  <th class="schedule_header contains_action header_condensed type_sr method-switch" hidden>
                                            <span class="schedule_header_label">Sr#</span>
                                            <svg class="symbol symbol_carets symbol_gray">
                                                <use xlink:href="#carets"></use>
                                            </svg>

                                        </th> -->
                        <th class="schedule_header contains_action header_condensed type_sched. method-switch">
                          <span class="schedule_header_label">Sched.</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action header_condensed type_update">
                          <span class="schedule_header_label">Update</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action header_condensed type_to">
                          <span class="schedule_header_label">From</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_airline">
                          <select class="schedule_header_select_airline" onchange="filterByAirline(this.value,1)">
                            <option value="">Select an Airline</option>
                          </select>
                        </th>
                        <th class="schedule_header contains_action header_condensed type_flight #">
                          <span class="schedule_header_label">Flight #</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_gate">
                          <span class="schedule_header_label">Gate</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_baggage claim">
                          <span class="schedule_header_label">Baggage Claim</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_status">
                          <span class="schedule_header_label">Status</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                      </tr>
                    </thead>
                    <tbody class="schedule_table_body_section_1">


                    </tbody>

                  </table>
                </div>
                <div class="responsive_table mobile">
                  <table class="schedule_table schedule_table_sm" id="schedule_table_mobile_1" style="margin:unset !important; width:100% !important;">
                    <thead>
                      <tr class="schedule_header_row">
                      <tr class="schedule_header_row">
                        <!--  <th class="schedule_header contains_action header_condensed type_sr method-switch" hidden>
                                            <span class="schedule_header_label">Sr#</span>
                                            <svg class="symbol symbol_carets symbol_gray">
                                                <use xlink:href="#carets"></use>
                                            </svg>

                                        </th> -->
                        <th class="schedule_header contains_action header_condensed type_sched. method-switch">
                          <span class="schedule_header_label">Sched.</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action header_condensed type_update">
                          <span class="schedule_header_label">Update</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action header_condensed type_to">
                          <span class="schedule_header_label">From</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_airline">
                          <select class="schedule_header_select_airline" onchange="filterByAirline(this.value,1)">
                            <option value="">Select an Airline</option>
                          </select>
                        </th>
                        <th class="schedule_header contains_action header_condensed type_flight #">
                          <span class="schedule_header_label">Flight #</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_gate">
                          <span class="schedule_header_label">Gate</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_baggage claim">
                          <span class="schedule_header_label">Baggage Claim</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_status">
                          <span class="schedule_header_label">Status</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                      </tr>
                    </thead>
                    <tbody class="schedule_table_body_section_1 mobile">


                    </tbody>
                  </table>
                </div>
                <div class="schedule_no_results schedule_no_results_section_1" style="display:none;">
                  <p>No relevant flights found: Try broadening your search above.</p>
                </div>
              </div>
            </div>

            <div class="schedule_section departure-sec-tab schedule_section_2 fs-swap-target fs-swap-enabled <?php if ((isset($pagename) && $pagename == "departure") || (isset($_GET['hud_arrival_depature']) && $_GET['hud_arrival_depature'] == 'departure')) {
                                                                                                                echo "fs-swap-active";
                                                                                                              } ?>">
              <div class="schedule_list">
                <div class="responsive_table">
                  <table class="schedule_table schedule_table_lg" id="schedule_table_2" style="margin:unset !important; width:100% !important;">
                    <thead>
                      <tr class="schedule_header_row">
                      <tr class="schedule_header_row">
                        <!-- <th class="schedule_header contains_action header_condensed type_sr method-switch" hidden >
                                            <span class="schedule_header_label">Sr#</span>
                                            <svg class="symbol symbol_carets symbol_gray">
                                                <use xlink:href="#carets"></use>
                                            </svg>

                                        </th> -->
                        <th class="schedule_header contains_action header_condensed type_sched. method-switch">
                          <span class="schedule_header_label">Sched.</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action header_condensed type_update">
                          <span class="schedule_header_label">Update</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action header_condensed type_to">
                          <span class="schedule_header_label">To</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_airline">
                          <select class="schedule_header_select_airline" onchange="filterByAirline(this.value,2)">
                            <option value="">Select an Airline</option>
                          </select>
                        </th>
                        <th class="schedule_header contains_action header_condensed type_flight #">
                          <span class="schedule_header_label">Flight #</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_gate">
                          <span class="schedule_header_label">Gate</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_baggage claim">
                          <span class="schedule_header_label">Baggage Claim</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_status">
                          <span class="schedule_header_label">Status</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                      </tr>
                    </thead>
                    <tbody class="schedule_table_body_section_2">

                    </tbody>
                  </table>
                </div>
                <div class="responsive_table">
                  <table class="schedule_table schedule_table_sm" id="schedule_table_mobile_2" style="margin:unset !important; width:100% !important;">
                    <thead>
                      <tr class="schedule_header_row">
                      <tr class="schedule_header_row">
                        <!--  <th class="schedule_header contains_action header_condensed type_sr method-switch" hidden>
                                            <span class="schedule_header_label">Sr#</span>
                                            <svg class="symbol symbol_carets symbol_gray">
                                                <use xlink:href="#carets"></use>
                                            </svg>

                                        </th> -->
                        <th class="schedule_header contains_action header_condensed type_sched. method-switch">
                          <span class="schedule_header_label">Sched.</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action header_condensed type_update">
                          <span class="schedule_header_label">Update</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action header_condensed type_to">
                          <span class="schedule_header_label">To</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_airline">
                          <select class="schedule_header_select_airline" onchange="filterByAirline(this.value,2)">
                            <option value="">Select an Airline</option>
                          </select>
                        </th>
                        <th class="schedule_header contains_action header_condensed type_flight #">
                          <span class="schedule_header_label">Flight #</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_gate">
                          <span class="schedule_header_label">Gate</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_baggage claim">
                          <span class="schedule_header_label">Baggage Claim</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                        <th class="schedule_header contains_action type_status">
                          <span class="schedule_header_label">Status</span>
                          <svg class="symbol symbol_carets symbol_gray">
                            <use xlink:href="#carets"></use>
                          </svg>

                        </th>
                      </tr>
                    </thead>
                    <tbody class="schedule_table_body_section_2">

                    </tbody>
                  </table>
                </div>
                <div class="schedule_no_results schedule_no_results_section_2" style="display:none;">
                  <p>No relevant flights found: Try broadening your search above.</p>
                </div>
              </div>
            </div>

            <div class="schedule_details" id="schedule_details">
              <div class="schedule_ribbon">
                <h4 class="schedule_ribbon_title">Delta Flight # 1159</h4>
                <button class="schedule_ribbon_link">
                  <span>Track Another Flight</span>
                  <svg class="symbol symbol_arrow_right symbol_red">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow_right"></use>
                  </svg>
                </button>
              </div>
              <div class="schedule_detail">
                <div class="schedule_status">
                  <span class="schedule_status_label">Status: </span>
                  <span class="schedule_table_status ">Arrived</span>
                </div>
                <div class="schedule_table_grid">
                  <div class="responsive_table">
                    <table class="schedule_table">
                      <tbody>
                        <tr class="schedule_header_row">
                          <th class="schedule_header header_condensed"></th>
                          <th class="schedule_header header_condensed"></th>
                        </tr>
                        <tr class="schedule_row">
                          <td class="schedule_table_item">Airport:</td>
                          <td class="schedule_table_item schedule_table_item_airport">SLC</td>
                        </tr>
                        <tr class="schedule_row">
                          <td class="schedule_table_item">Scheduled Time:</td>
                          <td class="schedule_table_item schedule_table_item_schedule">6:10 AM</td>
                        </tr>
                        <tr class="schedule_row">
                          <td class="schedule_table_item">Estimated Time:</td>
                          <td class="schedule_table_item schedule_table_item_estimated">6:16 AM</td>
                        </tr>
                        <tr class="schedule_row">
                          <td class="schedule_table_item">Terminal/Gate:</td>
                          <td class="schedule_table_item schedule_table_item_gate">D29</td>
                        </tr>
                        <tr class="schedule_row">
                          <td class="schedule_table_item">Baggage Claim:</td>
                          <td class="schedule_table_item schedule_table_item_claim">14</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <button class="schedule_link">
                  <span>Track Another Flight</span>
                  <svg class="symbol symbol_arrow_right symbol_red">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow_right"></use>
                  </svg>
                </button>
              </div>
            </div>

      </section>

    </div>

  </div>

</div>

<?php

get_footer();

$date = isset($_GET['date']) ? $_GET['date'] : '';
$flightNumber = isset($_GET['flight']) ? $_GET['flight'] : '';
if (isset($pagename) && ($pagename != 'arrival' || $pagename != 'departure')) {
  $hud_arrival_departure = isset($_GET['hud_arrival_depature']) ? $_GET['hud_arrival_depature'] : '';
} else {
  $hud_arrival_departure = $pagename;
}

?>

<style>
  /*.page-template{visibility: hidden}; */
  #schedule_table_mobile_1_filter,
  #schedule_table_mobile_2_filter {
    display: none;
  }
</style>
<script type="text/javascript">
  var SITEURL = <?php echo "'" . get_site_url() . "'"; ?>;
  var THEMEROOTDIR = SITEURL + '/wp-content/themes/bwitheme/';
  // var THEMEROOTDIR = 'https://wwwbwiairport.com/wp-content/themes/bwitheme/';
  //  console.log(THEMEROOTDIR);

  var DATE = <?php echo "'" . $date . "'"; ?>;
  var FLIGHT = <?php echo "'" . $flightNumber . "'"; ?>;
  var HUD_ARRIVAL_DEPARTURE = <?php echo "'" . $hud_arrival_departure . "'"; ?>;

  $(document).ready(function() {

    // $('#schedule_table_1, #schedule_table_2').DataTable({
    //                paging: false,
    //                columnDefs : [ {
    //                    'targets': [-1,3], /* column index */
    //                    'orderable': true, /* true or false */
    //                }]
    //    });
    function getFlightData() {
      $.post(THEMEROOTDIR + 'ajaxcall.php?action=get_flights_data', {
          siteRootDir: SITEURL,
          themeRootDir: THEMEROOTDIR,
          date: DATE,
          flight: FLIGHT,
          hud_arrival_depature: HUD_ARRIVAL_DEPARTURE
        },
        function(html) {

          var htmlString = JSON.parse(html);
          $('.schedule_header_select_airline').html(htmlString.Airlines);

          // if(htmlString.Arrival_Arrays ){
          //      console.log(htmlString.Arrival_Arrays)
          // }
          if (htmlString.Arrivals || htmlString.Departures) {
            // console.log(htmlString.Arrivals)


            if (htmlString.Arrivals) {
              $('.schedule_table_body_section_1').html(htmlString.Arrivals);
            } else {
              $('.schedule_no_results_section_1').css('display', 'block');
            }
            if (htmlString.Departures) {
              $('.schedule_table_body_section_2').html(htmlString.Departures);
            } else {
              $('.schedule_no_results_section_2').css('display', 'block');
            }

            if (!$.fn.DataTable.isDataTable('#schedule_table_1')) {

              $('#schedule_table_1, #schedule_table_2').DataTable({
                paging: false
              });
              $('#schedule_table_mobile_1, #schedule_table_mobile_2').DataTable({
                paging: false
              });



            }
            runByhtmlLoad();

          } else {
            $('.schedule_no_results').css('display', 'block');
          }
        });

    }

    getFlightData();
    getFlightData(); // call twice to resolve missing values issue

    //refreshLogic(); // call twice to resolve missing values issue
    function refreshLogic() {
      if (localStorage.refreshCount)
        localStorage.refreshCount = Number(localStorage.refreshCount) + 1;
      else localStorage.refreshCount = 0;

      if (localStorage.refreshCount && localStorage.refreshCount < 1)
        location.reload(true);
      console.log(localStorage.refreshCount);
      if (localStorage.refreshCount && localStorage.refreshCount > 0) {
        $(".page-template").css("visibility", "unset");
        localStorage.removeItem('refreshCount');
      }

    }

  });

  $('.schedule_switch').on('click', function() {
    $("button.schedule_switch").toggleClass("fs-swap-active");
    $("div.schedule_section").toggleClass("fs-swap-active");

    $(".schedule_section").removeClass("not-visible");
    $(".schedule_section").removeClass("not-visible");
    $(".schedule_details").removeClass("visible");

  });

  $('.schedule_ribbon_link,.schedule_link').on('click', function() {
    $(".schedule_section").removeClass("not-visible");
    $(".schedule_section").removeClass("not-visible");
    $(".schedule_details").removeClass("visible");
  });

  function filterByAirline(airline, type) {

    event.preventDefault();

    var flight_type = type == 1 ? 'arrival' : 'departure';
    $.post(THEMEROOTDIR + 'ajaxcall.php?action=get_flights_data', {
        siteRootDir: SITEURL,
        themeRootDir: THEMEROOTDIR,
        airlineName: airline,
        hud_arrival_depature: flight_type
      },
      function(html) {

        var htmlString = JSON.parse(html);
        if (htmlString.Arrivals || htmlString.Departures) {

          if (htmlString.Arrivals) {
            $('.schedule_table_body_section_1').html(htmlString.Arrivals);
          } else {
            $('.schedule_no_results_section_1').css('display', 'block');
          }
          if (htmlString.Departures) {
            $('.schedule_table_body_section_2').html(htmlString.Departures);
          } else {
            $('.schedule_no_results_section_2').css('display', 'block');
          }

          $('#schedule_table_1, #schedule_table_2').DataTable();
          runByhtmlLoad();

        } else {
          $('.schedule_no_results').css('display', 'block');
        }
      });
  }

  function runByhtmlLoad() {

    $('#schedule_table_1 .schedule_table_body_section_1 tr, #schedule_table_2 .schedule_table_body_section_2 tr').on('click', function() {

      //var cn = document.getElementById('schedule_details');
      //window.location.href = '#schedule_details';

      // cn.contentEditable=true;                 
      // cn.focus();
      // cn.contentEditable=false;

      //$('#schedule_details').scrollTop($('#schedule_details')[0].scrollHeight);
      //$("#schedule_details").animate({ scrollTop: $('#schedule_details').prop("scrollHeight")}, 1000);

      var flightType = $(this).attr('data-section');
      var arrayIndex = $(this).attr('data-key');
      $.post(THEMEROOTDIR + 'ajaxcall.php?action=get_flight_details', {
          themeRootDir: THEMEROOTDIR,
          hud_arrival_depature: flightType,
          arrayIndex: arrayIndex,
        },
        function(html) {

          var htmlString = JSON.parse(html);

          $('.schedule_section').addClass('not-visible');
          $('.schedule_section').addClass('not-visible');
          $('.schedule_details').addClass('visible');

          var d = $('#schedule_details');
          d.scrollTop(d.prop("scrollHeight"));

          //$("#schedule_details").animate({ scrollTop: $('#schedule_details').prop("scrollHeight")}, 1000);

          $('.schedule_table_status').text(htmlString.status_text);
          $('.schedule_table_status').addClass(htmlString.status_text);

          $('.schedule_detail table tbody > tr.schedule_header_row > th:nth-child(1)').text(flightType);
          $('.schedule_table_item_airport').text(htmlString.airport_code);

          $('.schedule_table_item_schedule').text(htmlString.scheduled_time);
          $('.schedule_table_item_estimated').text(htmlString.actual_time);

          $('.schedule_table_item_gate').text(htmlString.gate);
          $('.schedule_table_item_claim').text(htmlString.baggage_claim);

        });

    });
  }


  $(document).ready(function() {
    $('.fs-dropdown-selected').click(function() {
      $('#fs-dropdown__0-dropdown').addClass('fs-dropdown-open');
    });
    $('.fs-scrollbar-content .fs-dropdown-item').click(function() {
      var buttonText = $(this).text();

      $('#fs-dropdown__0-dropdown-selected').text(buttonText);
    });
  });
</script>