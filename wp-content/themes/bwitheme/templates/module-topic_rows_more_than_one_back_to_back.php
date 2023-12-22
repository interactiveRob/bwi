<?php 


$datas = get_sub_field('topic_row');

//print_r($datas);  ?>

<div class="section_topic_row_btb">

<?php

foreach($datas as $data){

?>

<section class="container-fluid listing_container custom_tworows">
    <div class="row">
        <div class="listing_artical">
             <?php //$sec_img_right = get_field('section_image_right_with_title_desc_and_btn'); 
                $title = $data['title'];  //get_sub_field('title');
                $desc = $data['description'];  //get_sub_field('description');
                $btn = $data['button']; //get_sub_field('button');
                $img = $data['image']; //get_sub_field('image');
                $btn2 = $data['button_2']; //get_sub_field('button_2');
             //print_r($sec_img_right);
             ?>
             <div class="row">
                 <div class="col-sm-8">
                     <h2 class="listing_item_title"><?php echo $title; ?></h2>
                     <p class="listing_item_caption"><?php echo $desc; ?></p>
                     <a href="<?php echo $btn['url']; ?>" class="listing_item_link" target="<?php echo $btn['target'];  ?>"><?php echo $btn['title']; ?><svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg></a>
                     <?php if(isset($btn2['title'])){ ?>
                     <a href="<?php echo $btn2['url']; ?>" class="listing_item_link" target="<?php echo $btn2['target'];  ?>"><?php echo $btn2['title']; ?><svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg></a>
                 <?php } ?>
                 </div>
                 <div class="col-sm-4 con_img">
                     <img class="listing_image" src="<?php echo $img['url'] ?>" alt="<?php echo $img['alt'] ?>">
                 </div>
             </div>

         </div>
    </div>
</section>

<?php } ?>

</div>