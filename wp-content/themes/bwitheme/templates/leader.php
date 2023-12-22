<?php 
//echo 'Leaderships';

/*if(have_rows('Airport Leadership')){
	the_row();
    get_template_part('templates/leader', get_row_layout());


    $name = get_sub_field('name');
$prifile_image = get_sub_field('profile_image');
$position = get_sub_field('position');


}*/
if(get_field('leader') != ''){
//print_r(get_field('leader'));

$leaders = get_field('leader');
foreach($leaders as $leader){
	print_r($leader['name']);
}

}
             

?>