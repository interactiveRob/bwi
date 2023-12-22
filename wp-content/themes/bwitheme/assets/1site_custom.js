jQuery( document ).ready(function() {
	
	$('.custom_childsidebar h2').click(function(){
		$(this).parents('.custom_childsidebar').siblings('.sub_nav_wraper').toggleClass('show-side-menu');
		$(this).parents('.custom_childsidebar').toggleClass('active');
	})
	
	$('.sub_nav_title').click(function(){
		var $this = $(this);
		$this.toggleClass('active-button');

// 		if($this.hasClass('active-button')){
// 			$this.text('Close');         
// 		} else {
// 			$this.text('At BWI');
// 		}

	});

//  	if($this.hasClass('sub_nav_title')){
//          $this.text('close');         
//      } else {
//          $this.text('At BWI');
//      }

    console.log( "ready! stady go" );

    jQuery('input#hud_flight_input').on('keyup', function() {
        //console.log(this.value.length);
        if(this.value.length >= 3){
            jQuery('.hud_flight_date').addClass('show_remaining_inputs');
        } else {
            jQuery('.hud_flight_date').removeClass('show_remaining_inputs');
        }
    });

    jQuery('.header_search input#s').attr('placeholder', 'Search...');

    jQuery('.oc_btn').click(function(){

        //alert('Hello world@');
        
        if($(this).hasClass('close')){
           $(this).removeClass('close').addClass('open');             
        }
	else if('open'){
           $(this).removeClass('open').addClass('close');		
        }
	else{
	   $(this).addClass('open'); 	
	}

        $('.header_search').toggleClass('swap-active');
	$('.header_search').addClass('site_search_lg');
	/*$('.search').toggle();*/
	

    });

    jQuery('.menu_desktop ul.menu li.menu-item').hover(function(){

        jQuery(this).children('ul.sub-menu').toggle();
        // jQuery('.custom-select .select-items div').removeClass('same-as-selected');
        // jQuery(this).addClass('same-as-selected');
      
   });
    var heightf = jQuery('footer.footer').height()+100;
    jQuery('.placeholder').css('height', heightf);

    jQuery('.g_translate').click(function(){
    jQuery('.goog-te-menu-frame.skiptranslate').toggle();
    });

    jQuery('.search_mobile input#s').attr('placeholder', 'Search...');
    
    jQuery('#menu-footer-menu a').wrapInner('<span class="foo_a_text"></span>');
    jQuery('#menu-footer-menu-1 a').wrapInner('<span class="foo_a_text"></span>');
    jQuery('.sidebar_menu ul.sub-menu li.first_child.active li a').wrapInner('<span class="sidemenu_a_text"></span>');
jQuery('<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg>').insertAfter('.foo_a_text');
});

function myFunction() {
  var x = document.getElementById("myLinks");
  if (x.style.display === "block") {
    x.style.display = "none";
    jQuery('.mobile_menu .hum_title').text('MENU');
    //jQuery('.mobile_menu .material-symbols-outlined').removeClass("cross");
    jQuery('.mobile_menu .mobile_sidebar_handle_icon').removeClass("cross");
  } else {
    x.style.display = "block";
    jQuery('.mobile_menu .hum_title').text('CLOSE');
    //jQuery('.mobile_menu .material-symbols-outlined').addClass("cross");
    jQuery('.mobile_menu .mobile_sidebar_handle_icon').addClass("cross");

  }
}




jQuery(document).ready(function(){

    /*jQuery('.mobile_menu .icon').click(function(){
        var txt = jQuery('.mobile_menu .hum_title').text();
        jQuery('.mobile_menu .hum_title').text(txt=="CLOSE"?"MENU":"CLOSE");
        jQuery('.mobile_menu .material-symbols-outlined').toggleClass("cross");
    });*/

    jQuery('.custom-select .select-selected').click(function(){
        const el = document.querySelector('.custom-select')
        const rect = el.getBoundingClientRect();
        //console.log(rect.top, rect.right, rect.bottom, rect.left);
        var selheight = jQuery('.custom-select .select-items').height();
            console.log(selheight);
        if(rect.top > selheight && rect.bottom > selheight){
            //console.log('bottom'+rect.bottom);
            jQuery('.custom-select .select-items').toggleClass('select-arrow-bottom');
        } else if(rect.top < selheight && rect.bottom < selheight) {
            //console.log('top'+rect.top);
        } else {
            //console.log('neutral');
        }

        
        jQuery(this).toggleClass('select-arrow-active');
        jQuery('.custom-select .select-items').toggleClass('select-hide');
    });
    
    jQuery('.custom-select .select-items div').click(function(){
        jQuery('.custom-select .select-items div').removeClass('same-as-selected');
        jQuery(this).addClass('same-as-selected');
        jQuery('.custom-select .select-items').addClass('select-hide');
        jQuery('.custom-select .select-selected').removeClass('select-arrow-active');
        jQuery('.custom-select .select-selected').text(jQuery(this).text());
    });


     setInterval(mobile_flights_data_setup, 1000);
     function mobile_flights_data_setup()
     {
        var x = window.matchMedia("(max-width: 1220px)");
        if (x.matches && $(".schedule_table_item_key strong").length < 1 )
        { // If media query matches
            jQuery('.schedule_section .responsive_table tbody.schedule_table_body_section_1 tr').each(function(){
                var sel = jQuery(this).find('td.schedule_table_item:nth-child(6)').html();
                jQuery(this).find('td.schedule_table_item:nth-child(1)').append('</br><strong>Gate: </strong>'+sel);
            });
            jQuery('.schedule_section .responsive_table tbody.schedule_table_body_section_1 tr').each(function(){
                var sel1 = jQuery(this).find('td.schedule_table_item:nth-child(7)').html();
                jQuery(this).find('td.schedule_table_item:nth-child(2)').append('</br><strong>Baggage Claim: </strong>'+sel1);
            });
            jQuery('.schedule_section .responsive_table tbody.schedule_table_body_section_1 tr').each(function(){
                var sel2 = jQuery(this).find('td.schedule_table_item:nth-child(8) span').text();
                jQuery(this).find('td.schedule_table_item:nth-child(3)').append('</br><strong>'+sel2+'</strong>');
            });
            jQuery('.schedule_section .responsive_table tbody.schedule_table_body_section_1 tr').each(function(){
                var sel3 = jQuery(this).find('td.schedule_table_item:nth-child(4)').html();
                jQuery(this).find('td.schedule_table_item:nth-child(5)').append('</br>'+sel3);
            });

            jQuery('.schedule_section .responsive_table tbody.schedule_table_body_section_2 tr').each(function(){
                var sel4 = jQuery(this).find('td.schedule_table_item:nth-child(6)').html();
                jQuery(this).find('td.schedule_table_item:nth-child(1)').append('</br><strong>Gate: </strong>'+sel4);
            });
            jQuery('.schedule_section .responsive_table tbody.schedule_table_body_section_2 tr').each(function(){
                var sel5 = jQuery(this).find('td.schedule_table_item:nth-child(7)').html();
                jQuery(this).find('td.schedule_table_item:nth-child(2)').append('</br><strong>Baggage Claim: </strong>'+sel5);
            });
            jQuery('.schedule_section .responsive_table tbody.schedule_table_body_section_2 tr').each(function(){
                var sel6 = jQuery(this).find('td.schedule_table_item:nth-child(8) span').text();
                jQuery(this).find('td.schedule_table_item:nth-child(3)').append('</br><strong>'+sel6+'</strong>');
            });
            jQuery('.schedule_section .responsive_table tbody.schedule_table_body_section_2 tr').each(function(){
                var sel7 = jQuery(this).find('td.schedule_table_item:nth-child(4)').html();
                jQuery(this).find('td.schedule_table_item:nth-child(5)').append('</br>'+sel7);
            });
        }

     }
    // Skip to main content btn script start //

    var screen_height = parseFloat(jQuery((document)).height()) || 0;
    var by = 2;
    var half = screen_height / by;
    jQuery(window).scroll(function(){
        if (jQuery(this).scrollTop() > half) {
           jQuery('.skip_content_btn').addClass('show');
        } else {
           jQuery('.skip_content_btn').removeClass('show');
        }
    });

    // Skip to main content btn script end //

    // Global area lables script start //
    jQuery('.main_menu ul').attr('aria-label', 'Site Navigation');
    jQuery('.secondry_menu ul').attr('aria-label', 'Secondary Navigation');
    jQuery('.searchform input#searchsubmit').attr('aria-label', 'submit');
    jQuery('.foo_helpfull_links ul').attr('aria-label', 'Helpful Links');
    jQuery('.sidebar_menu ul').attr('aria-label', 'Additional Navigation');
    // Global area lables script end //

});



/*jQuery(window).load(function () {
    setTimeout(
          function() 
          {
            var screen_height = jQuery(window).height();
            //console.log(screen_height);
            //alert(screen_height);
            var height = screen_height - 93;
            jQuery('.menu_desktop .parent > ul.sub-menu').css('height', height);
    }, 1000);

});*/


/****link to css****/



 /*jQuery(document).ready(function($) {
        if (window.location.href.indexOf("to-from-bwi") > -1) {
         cssFilePath = 'https://carey.jhu.edu/themes/custom/carey/assets/css/styles.css';
        loadCSS(cssFilePath);
        }
        // To load CSS file
        function loadCSS(cssFilePath)
        {
            // The string stores the name of files added till now
            var filesAdded = '';
            if(filesAdded.indexOf(cssFilePath) !== -1)
                return
            var head = document.getElementsByTagName('head')[0]
            // Creating link element
            var style = document.createElement('link')
            style.href = cssFilePath
            style.type = 'text/css'
            style.rel = 'stylesheet'
            head.append(style);
            // Adding the name of the file to keep record
            filesAdded += ' ' + cssFilePath
        }
    });*/

/***reload***/
// $( "#menu-item-464" ).click(function() {
//   alert( "Handler for " );
// });
// const testReloadMenu1 = document.getElementById("menu-item-464");
// testReloadMenu1.addEventListener('click', function(){
// 	setTimeout(function(){
//     location = ''
//   },60000)
// });
// const testReloadMenu2 = document.getElementById("menu-item-914");
// const testReloadMenu3 = document.getElementById("menu-item-1342");

// testReloadMenu1.addEventListener('click', function(){
// 	reloadPage();
//     console.log("777");
// });

// testReloadMenu2.addEventListener('click', function(){
// 	reloadPage();
// });

// testReloadMenu3.addEventListener('click', function(){
// 	reloadPage();
// });
//  function reloadPage(){
//         location.reload(true);
//     }
    
   /* document.getElementById("menu-item-464").onclick = function()
    {
    location.reload(true);
    }*/
/*console.log("test2222");*/
// <script>
//    document.getElementById("menu-item-464").onclick = location.reload(); 1000);
//     document.getElementById("menu-item-914").onclick = location.reload(); 1000);
//     document.getElementById("menu-item-1342").onclick = location.reload(); 1000);
// </script>

jQuery(document).ready(function($) {
        //nav menu dropdown hover issue fix script menu-main-menu
        //if( $( ".parent.menu-item" ).length > 0)
            if( $( "#menu-main-menu" ).length > 0)
        {
            //$( ".parent.menu-item" ).each(function() {
                 $( "#menu-main-menu" ).each(function() {
                $( this ).find('.sub-menu').hide();
                //$(this ).mouseleave(function() { $( ".menu-item .sub-menu" ).hide(); });
                $(this ).mouseleave(function() { $( "#menu-main-menu .sub-menu" ).hide(); });
            });

        }
      

});
//wayfinding filter issue
jQuery(document).ready(function($) {
   if( window.location.pathname.indexOf("at-bwi/maps") >= 0 && $('.same-as-selected a').length >= 0)
   {
    
        $('.custom-select .select-items .same-as-selected').each(function(){
            // $(this).click(function(){
            //     $(this).find('a').click();
            // });
            let url = new URL($(this).find('a').attr('href'));
            let params = new URLSearchParams(url.search);
            url.search = '';
            const result = url.toString();
            var aTag = $(this).find('a');
            $(aTag).attr('href', result);
            // console.log($(aTag).text());
            // console.log("   ----    ");
            $(this).click(function(e){
                localStorage.setItem("filterParamsValue", $(aTag).text().replace(" Map", ''));
                window.location.href =  $(this).find('a').attr('href');
            });
         });
    }
    //
   if( window.location.pathname.indexOf("at-bwi/things-to-do/stores") >= 0 && $('a.map-query-plan_link').length >= 0)
   {

            let url = new URL($('a.map-query-plan_link').attr('href'));
            let params = new URLSearchParams(url.search);
            url.search = '';
            const result = url.toString();
            $('a.map-query-plan_link').attr('href', result);
            $('a.map-query-plan_link').click(function(){
                localStorage.setItem("filterParamsValue", 'Shopping');
                window.location.href =  $('a.map-query-plan_link').attr('href');
            });

    }
    //
    if( window.location.pathname.indexOf("at-bwi/things-to-do/food-drink") >= 0 && $('a.map-query-plan_link').length >= 0)
    {

             let url = new URL($('a.map-query-plan_link').attr('href'));
             let params = new URLSearchParams(url.search);
             url.search = '';
             const result = url.toString();
             $('a.map-query-plan_link').attr('href', result);
             $('a.map-query-plan_link').click(function(){
                 localStorage.setItem("filterParamsValue", 'Food & Drink');
                 window.location.href =  $('a.map-query-plan_link').attr('href');
             });

     }
     //
     if( window.location.pathname.indexOf("at-bwi/things-to-do/fitness") >= 0 && $('a.map-query-plan_link').length >= 0)
     {

              let url = new URL($('a.map-query-plan_link').attr('href'));
              let params = new URLSearchParams(url.search);
              url.search = '';
              const result = url.toString();
              $('a.map-query-plan_link').attr('href', result);
              $('a.map-query-plan_link').click(function(){
                  localStorage.setItem("filterParamsValue", 'Fitness');
                  window.location.href =  $('a.map-query-plan_link').attr('href');
              });

      }

    //
     if( window.location.pathname.indexOf("flying-with-us/flights/arrival") >= 0 || window.location.pathname.indexOf("flying-with-us/flights") >= 0)
     {
          var count = 0;
         // function creation
          let interval = setInterval(function(){
              if($('.schedule_table_item .schedule_table_item_link').length > 0 )
              {
                  
                   $('.schedule_table_item .schedule_table_item_link').each(function(){
                      count++;
                      let url = new URL($(this).attr('href'));
                      let params = new URLSearchParams(url.search);
                      url.search = '';
                      const result = url.toString();
                       $(this).attr('href', result);
                      // console.log($(this).find('.schedule_table_item_key').text());
                      //  console.log("   ----    ");
                      $(this).click(function(e){
                          localStorage.setItem("filterParamsValue", $(this).find('.schedule_table_item_key').text());
                          window.location.href =  $(this).attr('href');
                      });
                   });
                   if( count > 4000)
                     clearInterval(interval);// stop the interval
                  
               }

          }, 1000);  //every second
      }

    // at-bwi/places-to-go/meditation-room/
     if( window.location.pathname.indexOf("at-bwi/places-to-go/meditation-room") >= 0 && $('.map-query-info_items .map-query-plan_link').length >= 0)
     {
              let url = new URL($('.map-query-info_items .map-query-plan_link').attr('href'));
              let params = new URLSearchParams(url.search);
              url.search = '';
              const result = url.toString();
              $('.map-query-info_items .map-query-plan_link').attr('href', result);
              $('.map-query-info_items .map-query-plan_link').click(function(){
                  localStorage.setItem("filterParamsValue", 'Fitness');
                  window.location.href =  $('.map-query-info_items .map-query-plan_link').attr('href');
              });
     }

      $('a').each(function(){
        if($(this).attr('href') != undefined && $(this).attr('href').startsWith('https://bwiairport'))
        {
          let url = new URL($(this).attr('href'));
          let params = new URLSearchParams(url.search);
          if(params.has('filter'))
          {
              var queryParams = params.get('filter');
              $(this).click(function(){
                  url.search = '';
                  const result = url.toString();
                  $(this).attr('href', result);

                  localStorage.setItem("filterParamsValue", queryParams);
                  window.location.href =  $(this).attr('href');
              });
           }
        }


      });
      
      

});


jQuery(document).ready(function($) {
     if($(window).width() < 980)
     {
         $( "#google_language_translator" ).appendTo( "#mobile-lang-switch-wrapper" );
     }
     $('#fs-dropdown__0-dropdown-selected').on('click', function(){
      if($('#fs-dropdown__0-dropdown').hasClass('fs-dropdown-open'))
        $('#fs-dropdown__0-dropdown').removeClass("fs-dropdown-bottom fs-dropdown-open")
       else $('#fs-dropdown__0-dropdown').addClass("fs-dropdown-bottom fs-dropdown-open")
        
       $('.fs-dropdown-item ').on('click', function(event){
          $('#fs-dropdown__0-dropdown-selected').text($(this).attr("data-value"))
       })
     })



    // fs-swap-active
 
	const urlParams = new URLSearchParams(window.location.search);
	const flightParam = urlParams.get('flight');
	const arrivalDepartureParam = urlParams.get('hud_arrival_depature');

    if( flightParam != '' && arrivalDepartureParam != '' )
    {
    	//$('.schedule_section.schedule_section_1').css('display', 'none')
        if(arrivalDepartureParam == "departure")
        {
        	$('*[data-swap-target=".schedule_section_2"]').addClass('fs-swap-active')
        	$('*[data-swap-target=".schedule_section_1"]').removeClass('fs-swap-active')
        	$('.schedule_section.schedule_section_2').addClass('fs-swap-active')
        	$('.schedule_section.schedule_section_1').removeClass('fs-swap-active')
		   	
        }else if(arrivalDepartureParam == "arrival")
        {
        	 $('*[data-swap-target=".schedule_section_1"]').addClass('fs-swap-active')
        	$('*[data-swap-target=".schedule_section_2"]').removeClass('fs-swap-active')
             $('.schedule_section.schedule_section_1').addClass('fs-swap-active')
		   	 $('.schedule_section.schedule_section_2').removeClass('fs-swap-active')
        }
    }
    $('.schedule_switch').on('click', function(){
           $(".js-swap.schedule_switch").removeClass('fs-swap-active')
           $(this).addClass('fs-swap-active')
           if($(this).text() == 'Arrivals')
		   {
		   	   $('.schedule_section.schedule_section_1').addClass('fs-swap-active')
		   	   $('.schedule_section.schedule_section_2').removeClass('fs-swap-active')
		   }else if($(this).text() == 'Departures'){
		     	$('.schedule_section.schedule_section_1').removeClass('fs-swap-active')
		   	    $('.schedule_section.schedule_section_2').addClass('fs-swap-active')

		   }
          
    })
});

jQuery(document).ready(function($) {
$('#fs-dropdown__0-dropdown').find('#fs-dropdown__0-dropdown-selected').on('click', function(){
      $('#fs-dropdown__0-dropdown').toggleClass('fs-dropdown-open')
      $('#fs-dropdown__0-dropdown').find('.fs-scrollbar-bar').hide();
     

})

$('.fs-scrollbar-content  button').on('click', function(){
   //alert($(this).text())
   if($(this).text() == 'Arrivals')
   {
      $('.schedule_section.schedule_section_1').addClass('fs-swap-active')
      $('.schedule_section.schedule_section_2').removeClass('fs-swap-active')
      $('#fs-dropdown__0-dropdown-selected').text('Arrivals')
      $( ".fs-scrollbar-content  button" ).each(function() {
        if($(this).text() == 'Arrivals')
        {
           $(this).addClass('fs-dropdown-item_selected')
         }else $(this).removeClass('fs-dropdown-item_selected')
               
      });
      

    }
   else if( $(this).text() == 'Departures')
   {
      $('.schedule_section.schedule_section_2').addClass('fs-swap-active')
      $('.schedule_section.schedule_section_1').removeClass('fs-swap-active')
      $('#fs-dropdown__0-dropdown-selected').text('Departures')
      $( ".fs-scrollbar-content  button" ).each(function() {
        if($(this).text() == 'Departures')
        {
           $(this).addClass('fs-dropdown-item_selected')
         }else $(this).removeClass('fs-dropdown-item_selected')
               
      });
   }
    $('#fs-dropdown__0-dropdown').removeClass('fs-dropdown-open')
})
});
