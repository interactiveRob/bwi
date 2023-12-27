</div>

<div class="placeholder"></div>

<script>
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        if(selElmnt != undefined )
        {
            // ll = selElmnt.length;
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");

            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);

            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items");

            ll = selElmnt.length;
            for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function(e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                    }
                    h.click();
                });
                b.appendChild(c);
            }

            x[i].appendChild(b);
            a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
            });

        }
    }
function closeAllSelect(elmnt) {
    /*a function that will close all select boxes in the document,
    except the current select box:*/
    var x, y, i, xl, yl, arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
        arrNo.push(i)
        } else {
        y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
        x[i].classList.add("select-hide");
        }
    }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);

jQuery(document).ready(function($) {
    customSelectElems = $(".custom-select");
    if(customSelectElems != undefined)
    {

        $(customSelectElems).each(function(index, element) {
            customSelectElemsDiv = $(element).find(".select-selected")
            $(customSelectElemsDiv).on("click", function(e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                $(this).find(".select-items").toggle("select-hide");
                $(this).find(".select-items").toggle("select-arrow-active");
            });

            optionsWrapper = $(element).find(".select-items");
            options = $(optionsWrapper).find("div");
            if(options != undefined && options.length > 0)
            {
                $(options).each(function(optionindex, option) {
                   
                    $(option).on("click", function(e) {
                        /*when the select box is clicked, close any other select boxes,
                        and open/close the current select box:*/
                        e.stopPropagation();
                        optionsLink = $(option).find("a");
                        $(optionsWrapper).find("div a").removeClass("fs-dropdown-item");
                        $(optionsWrapper).find("div a").removeClass("fs-dropdown-item_selected");
                        $(optionsLink).addClass("fs-dropdown-item");
                        $(optionsLink).addClass("fs-dropdown-item_selected");

                        let url = new URL($(optionsLink).attr('href'));
                        let params = new URLSearchParams(url.search);
                        if(params.has('concourse'))
                        {
                            var queryParams = params.get('concourse');
                            url.search = '';
                            const result = url.toString();
                            $(optionsLink).attr('href', result);

                            localStorage.setItem("filterParamsValue", queryParams);
                            window.location.href =  $(optionsLink).attr('href');

                        }


                    });
                });

            }
        });
    }
});






// function checkScreenSize() {

//     if (window.innerWidth < 700) {

//         var postImageDiv = document.getElementsByClassName("post_image")[0];
//         var imgElement = postImage.querySelector("img");
//         imgElement.src = "/wp-content/uploads/2023/07/Mobile-ID-Google-Wallet.png"; 
//       }else{
//         imgElement.src = "/wp-content/uploads/2022/07/Homepage-Mobile-ID-Google-Wallet.png"; 
//       }
//   }
//   document.addEventListener('DOMContentLoaded', function() {
//     checkScreenSize();
//   });
//   window.addEventListener('resize', checkScreenSize);

</script>



<script>
    function checkScreenSize() {
      var postImageDivs = document.getElementsByClassName("post_image");

      for (var i = 0; i < postImageDivs.length; i++) {
        var imgElement = postImageDivs[i].querySelector("img");
        if (window.innerWidth < 740) {
          // For screen width less than 700px
          switch (i) {
            case 0:
              imgElement.src = "/wp-content/uploads/2023/07/Mobile-ID-Google-Wallet.png";
              break;
            case 1:
              imgElement.src = "/wp-content/uploads/2023/07/Passengers-At-Checkpoint-B-June-2023.png";
              break;
            case 2:
              imgElement.src = "/wp-content/uploads/2023/07/RestroomFinalist.png";
              break;
            default:
              break;
          }
        } else {
          // For screen width 700px or more
          switch (i) {
            case 0:
              imgElement.src = "/wp-content/uploads/2022/07/Homepage-Mobile-ID-Google-Wallet.png";
              break;
            case 1:
              imgElement.src = "/wp-content/uploads/2023/05/Homepage-Passengers-At-Checkpoint-B-June-2023.png";
              break;
            case 2:
              imgElement.src = "/wp-content/uploads/2022/05/Homepage-RestroomFinalist.png";
              break;
            default:
              break;
          }
        }
      }
    }

    document.addEventListener('DOMContentLoaded', function() {
      checkScreenSize();
    });

    window.addEventListener('resize', checkScreenSize);
  </script>





<script>
  function togglePlayPause(btn) {
    var video = btn.previousElementSibling; // Get the previous sibling (the video element)
    var playIcon = btn.querySelector('.fa-play'); // Get the play icon
    var pauseIcon = btn.querySelector('.fa-pause'); // Get the pause icon
    
    if (video.paused || video.ended) {
      video.play();
      playIcon.style.display = 'none';
      pauseIcon.style.display = 'inline-block';
    } else {
      video.pause();
      playIcon.style.display = 'inline-block';
      pauseIcon.style.display = 'none';
    }
  }
</script>








<footer class="footer">

    <div id= "ttr_footer" class="container">
        <div class="row">
            <div id="footer-sidebar1" class="col-sm-5">

                <?php
                    if(is_active_sidebar('footer_widget_1')){
                        dynamic_sidebar('footer_widget_1');
                    }
                ?>

            </div>

            <div id="footer-sidebar2" class="col-sm-7">

                <?php
                    if(is_active_sidebar('footer_widget_2')){
                        dynamic_sidebar('footer_widget_2');
                    }
                ?>

            </div>

            <div id="footer-sidebar3">
                <?php

                    if(is_active_sidebar('footer_widget_3')){
                        dynamic_sidebar('footer_widget_3');
                    }

                ?>
            </div>
        </div>
    </div>

</footer>

<?php wp_footer(); ?>

<script type="text/javascript">


    var SITEURL = <?php echo "'".get_site_url()."'"; ?>;
    var THEMEROOTDIR = SITEURL+'/wp-content/themes/bwitheme/';

    function getFlightNumber(value){
        if(jQuery('#hud_flight_input').val().length >= 3){
            jQuery('.hud_flight_date').css('display','block');
        }else{
            jQuery('.hud_flight_date').css('display','none');
        }
    }

    $(document).ready(function(){

        <?php if(is_front_page()){ ?>

        $.post(THEMEROOTDIR+'ajaxcall.php?action=get_parking_data',{
            themeRootDir:THEMEROOTDIR,
        },
        function(response){
            var data = JSON.parse(response);
            
            if(data.parkingAvailability){

                $.each(data.parkingAvailability.lots,function(index,value){

                    $('.hud_time').html(data.parkingAvailability.updated);

                    if(index == 'Daily'){
                        $('.hud_parking_availability_daily .js-parking_percent').text(value.percentage);
                        $('.hud_parking_availability_daily .hud_parking_status').text(value.status);
                        $('.hud_parking_availability_daily .hud_parking_spaces').text(value.available);
                        $('.hud_parking_availability_daily .hud_parking_status').addClass(value.class);
                    }
                    else if(index == 'Express'){
                        $('.hud_parking_availability_express .js-parking_percent').text(value.percentage);
                        $('.hud_parking_availability_express .hud_parking_status').text(value.status);
                        $('.hud_parking_availability_express .hud_parking_spaces').text(value.available);
                        $('.hud_parking_availability_express .hud_parking_status').addClass(value.class);
                    }
                    else if(index == 'Hourly'){
                        $('.hud_parking_availability_hourly .js-parking_percent').text(value.percentage);
                        $('.hud_parking_availability_hourly .hud_parking_status').text(value.status);
                        $('.hud_parking_availability_hourly .hud_parking_spaces').text(value.available);
                        $('.hud_parking_availability_hourly .hud_parking_status').addClass(value.class);
                    }
                    else if(index == 'Long-Term A'){
                        $('.hud_parking_availability_longtermA .js-parking_percent').text(value.percentage);
                        $('.hud_parking_availability_longtermA .hud_parking_status').text(value.status);
                        $('.hud_parking_availability_longtermA .hud_parking_spaces').text(value.available);
                        $('.hud_parking_availability_longtermA .hud_parking_status').addClass(value.class);
                    }
                    else if(index == 'Long-Term B'){
                        $('.hud_parking_availability_longtermB .js-parking_percent').text(value.percentage);
                        $('.hud_parking_availability_longtermB .hud_parking_status').text(value.status);
                        $('.hud_parking_availability_longtermB .hud_parking_spaces').text(value.available);
                        $('.hud_parking_availability_longtermB .hud_parking_status').addClass(value.class);
                    }
                });
            }

        });

        $.post(THEMEROOTDIR+'ajaxcall.php?action=get_hud_data',{
            themeRootDir:THEMEROOTDIR,
        },
        function(data){

            var data = JSON.parse(data);
            if(data.flightDates){
                $.each(data.flightDates, function( index, value ) {
                      var className = index == 0 ? 'fs-dropdown-item_selected' : '';
                      var selectedclassName = index == 0 ? 'selected' : '';
                      $('.fs-scrollbar-content').append('<button class="fs-dropdown-item '+className+'" role="option" type="button" data-value="'+value+'" aria-="">'+value+'</button>')
                      $(".hud_flight_dropdown").append('<option value="'+value+'" "'+selectedclassName+'">"'+value+'"</option>');
                      if(index == 0){
                        $('.fs-dropdown-selected').text(value);
                      }
                });
            }

        });

        $.post(THEMEROOTDIR+'ajaxcall.php?action=get_waitTimes_data',{
            themeRootDir:THEMEROOTDIR,
        },
        function(data){

            var data = JSON.parse(data);
            if(data.waitTimes){
                $('.hud_item_security .hud_time').html(data.waitTimes.updated);
                $.each(data.waitTimes.waittimes, function( index, value ) {

                    var Status = value.Queue_State != 'Closed' ? value.Projected_Wait_Time+' min' : value.Queue_State;
                    var Queue = value.Queue_Name.split(" ");

                    if(Queue[2] == 'A'){

                        if(Queue[3] == 'General'){
                            $('.hud_security_table_row_A .js-security-a-general').text(Status);
                        }else if(Queue[3] == 'Priority'){
                            $('.hud_security_table_row_A .js-security-a-priority').text(Status);
                        }
                        else if(Queue[3] == 'TSA-Pre'){
                            $('.hud_security_table_row_A .js-security-a-tsa_pre').text(Status);
                        }else if(Queue[3] == 'Clear'){
                            $('.hud_security_table_row_A .js-security-a-clear').text(Status);
                        }
                    }
                    else if(Queue[2] == 'BC'){

                        if(Queue[3] == 'General'){

                            $('.hud_security_table_row_B .js-security-b-general').text(Status);
                            $('.hud_security_table_row_C .js-security-c-general').text(Status);
                        }else if(Queue[3] == 'Priority'){

                            $('.hud_security_table_row_B .js-security-b-priority').text(Status);
                            $('.hud_security_table_row_C .js-security-c-priority').text(Status);
                        }
                        else if(Queue[3] == 'TSA-Pre'){
                            $('.hud_security_table_row_B .js-security-b-tsa_pre').text(Status);
                            $('.hud_security_table_row_C .js-security-c-tsa_pre').text(Status);
                        }else if(Queue[3] == 'Clear'){
                            $('.hud_security_table_row_B .js-security-b-clear').text(Status);
                            $('.hud_security_table_row_C .js-security-c-clear').text(Status);
                        }
                    }
                    else if(Queue[2] == 'B'){

                        if(Queue[3] == 'General'){
                            $('.hud_security_table_row_B .js-security-b-general').text(Status);
                        }else if(Queue[3] == 'Priority'){
                            $('.hud_security_table_row_B .js-security-b-priority').text(Status);
                        }
                        else if(Queue[3] == 'TSA-Pre'){
                            $('.hud_security_table_row_B .js-security-b-tsa_pre').text(Status);
                        }else if(Queue[3] == 'Clear'){
                            $('.hud_security_table_row_B .js-security-b-clear').text(Status);
                        }
                    }
                    else if(Queue[2] == 'DE'){

                        if(Queue[3] == 'General'){
                            $('.hud_security_table_row_DE .js-security-de-general').text(Status);
                        }else if(Queue[3] == 'Priority'){
                            $('.hud_security_table_row_DE .js-security-de-priority').text(Status);
                        }
                        else if(Queue[3] == 'TSA-Pre'){
                            $('.hud_security_table_row_DE .js-security-de-tsa_pre').text(Status);
                        }else if(Queue[3] == 'Clear'){
                            $('.hud_security_table_row_DE .js-security-de-clear').text(Status);
                        }
                    }

                });
            }

        });

        $('.fs-dropdown.fs-light').on('click',function(){
            $( ".fs-dropdown" ).focus();
            $( ".fs-dropdown" ).toggleClass("fs-dropdown-open");
        });

        // $('.fs-dropdown-options > .fs-scrollbar-content > button.fs-dropdown-item').on('click',function(){
        //     alert('Hello');
        //     $('button.fs-dropdown-item').toggleClass('fs-dropdown-item_selected');
        //     $('.fs-dropdown-selected').text($(this).prop('data-value'));
        // });

        <?php } ?>

        jQuery('.hud_parking.js-parking > p').css('display','none');
    });


</script>

</body>
</html>