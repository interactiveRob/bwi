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
//          $this.text('close');         zz
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
    x.style.transition-delay = "0.3s";
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

    var x = window.matchMedia("(max-width: 1220px)");
    if (x.matches) { // If media query matches
        setTimeout(
          function() 
          {
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

        }, 5000);
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



 jQuery(document).ready(function($) {
        if (window.location.href.indexOf("to-from-bwi") > -1) {
         cssFilePath = '/wp-content/themes/bwitheme/assets/mystyle.css';
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

        $(".logo_header  .logo_link").attr("href", "/");
    });



 /*************myc code 11-05-2023*****/
 /*$("..mobile_sidebar_handle_icon").click(function(){
   $("#myLinks").toggleClass("#myLinks.active");
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
