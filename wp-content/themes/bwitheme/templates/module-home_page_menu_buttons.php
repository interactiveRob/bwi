<?php 
            $menue1 = get_sub_field('menu_1');
            $menue2 = get_sub_field('menu_2');
            $menue3 = get_sub_field('menu_3');
            $menue4 = get_sub_field('menu_4');
            $menue5 = get_sub_field('menu_5');
            $menue6 = get_sub_field('menu_6');
            $menue1Icon = get_sub_field('menu_1_icon');
            $menue2Icon = get_sub_field('menu_2_icon');
            $menue3Icon = get_sub_field('menu_3_icon');
            $menue4Icon = get_sub_field('menu_4_icon');
            $menue5Icon = get_sub_field('menu_5_icon');
            $menue6Icon = get_sub_field('menu_6_icon');



            ?> <div class="destination_links_wrapper custom_flbtns"> 

            <div class="menu_cont container" aria-label="Common Destinations"> <?php 

            if(isset($menue1)){

                //$m1 = $menues['menu_1'];

                ?> <a href="<?php echo $menue1['url']; ?>" class="home_menues"><span class="text_icon"><span class="destination_item_link_icon">
                    <!-- <svg class="symbol symbol_dest_flights"><use xlink:href="#dest_flights"></use></svg> -->
                    <svg class="symbol symbol_dest_flights"><?php echo html_entity_decode(esc_html($menue1Icon));?></svg>
                  </span><span class="name"><?php echo @$menue1['title']; ?></span></span></a> <?php

            }

            if(isset($menue2)){

                //$m2 = $menues['menu_2'];

                ?> <a href="<?php echo $menue2['url']; ?>" class="home_menues"><span class="text_icon">
                    <span class="destination_item_link_icon">
                      <!-- <svg class="symbol symbol_dest_parking"> <use xlink:href="#dest_parking"></use> </svg> -->
                      <svg class="symbol symbol_dest_parking"><?php echo html_entity_decode(esc_html($menue2Icon));?></svg>
                    </span>
                    <span class="name"><?php echo @$menue2['title']; ?></span></span></a> <?php

            }

            if(isset($menue3)){

                //$m3 = $menues['menu_3'];

                ?> <a href="<?php echo $menue3['url']; ?>" class="home_menues"><span class="text_icon"><span class="destination_item_link_icon">
                      <!-- <svg class="symbol symbol_dest_transportation"><use xlink:href="#dest_transportation"></use></svg> -->
                      <svg class="symbol symbol_dest_transportation"><?php echo html_entity_decode(esc_html($menue3Icon));?></svg>
                    </span><span class="name"><?php echo @$menue3['title']; ?></span></span></a> <?php

            }

            if(isset($menue4)){

                //$m4 = $menues['menu_4'];

                ?> <a href="<?php echo $menue4['url']; ?>" class="home_menues"><span class="text_icon"><span class="destination_item_link_icon">
                      <!-- <svg class="symbol symbol_dest_aid"> <use xlink:href="#dest_aid"></use></svg> -->
                      <svg class="symbol symbol_dest_aid"> <?php echo html_entity_decode(esc_html($menue4Icon));?></svg>
                    </span><span class="name"><?php echo @$menue4['title']; ?></span></span></a> <?php

            }

            if(isset($menue5)){

                //$m5 = $menues['menu_1'];

                ?> <a href="<?php echo $menue5['url']; ?>" class="home_menues"><span class="text_icon"><span class="destination_item_link_icon">
                        <!-- <svg class="symbol symbol_dest_food"> <use xlink:href="#dest_food"></use> </svg> -->
                        <svg class="symbol symbol_dest_food"><?php echo html_entity_decode(esc_html($menue5Icon));?></svg>
                   </span><span class="name"><?php echo @$menue5['title']; ?></span></span></a> <?php

            }

            if(isset($menue6)){

                //$m6 = $menues['menu_6'];

                ?> <a href="<?php echo $menue6['url']; ?>" class="home_menues"><span class="text_icon"><span class="destination_item_link_icon">
                        <!-- <svg class="symbol symbol_dest_map"> <use xlink:href="#dest_map"></use> </svg> -->
                        <svg class="symbol symbol_dest_map"> <?php echo html_entity_decode(esc_html($menue6Icon));?></svg>
                    </span><span class="name"><?php echo @$menue6['title']; ?></span></span></a> <?php

            }

            ?> </div></div> <?php
