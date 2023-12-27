<?php 

$title = get_sub_field('title');
//$as_of = get_sub_field('as_of');
$description = get_sub_field('description');
$hourly_garage1 = get_sub_field('hourly_garage');
$daily_garage1 = get_sub_field('daily_garage');
$express_parking1 = get_sub_field('express_parking');
$long_term_parking_a1 = get_sub_field('long_term_parking_a');
$long_term_parking_b1 = get_sub_field('long_term_parking_b');
$message = get_sub_field('message');

$str = file_get_contents(get_template_directory().'/cache/parking-availability.json');
$parking_op = json_decode($str, true);
//echo '<pre>' . print_r($json, true) . '</pre>';

//print_r($parking_op);

$hourly_garage = $parking_op['lots']['Hourly'];
$daily_garage = $parking_op['lots']['Daily'];
$express_parking = $parking_op['lots']['Express'];
$long_term_parking_a = $parking_op['lots']['Long-Term A'];
$long_term_parking_b = $parking_op['lots']['Long-Term B'];




	/*if($hourly_garage['percentage'] <= '40' && $hourly_garage['percentage'] > '10'){
		$hourly_status = 'mostly-full';
	}elseif($hourly_garage['percentage'] >= '40'){
		$hourly_status = 'available';
	}elseif($hourly_garage['percentage'] <= '10'){
		$hourly_status = 'lot-full';
	}

	if($daily_garage['percentage'] <= '40' && $daily_garage['percentage'] > '10'){
		$daily_status = 'mostly-full';
	}elseif($daily_garage['percentage'] >= '40'){
		$daily_status = 'available';
	}elseif($daily_garage['percentage'] <= '10'){
		$daily_status = 'lot-full';
	}

	if($express_parking['percentage'] <= '40' && $express_parking['percentage'] > '10'){
		$express_status = 'mostly-full';
	}elseif($express_parking['percentage'] >= '40'){
		$express_status = 'available';
	}elseif($express_parking['percentage'] <= '10'){
		$express_status = 'lot-full';
	}

	if($long_term_parking_a['percentage'] <= '40' && $long_term_parking_a['percentage'] > '10'){
		$long_term_a_status = 'mostly-full';
	}elseif($long_term_parking_a['percentage'] >= '40'){
		$long_term_a_status = 'available';
	}elseif($long_term_parking_a['percentage'] <= '10'){
		$long_term_a_status = 'lot-full';
	}

	if($long_term_parking_b['percentage'] <= '40' && $long_term_parking_b['percentage'] > '10'){
		$long_term_b_status = 'mostly-full';
	}elseif($long_term_parking_b['percentage'] >= '40'){
		$long_term_b_status = 'available';
	}elseif($long_term_parking_b['percentage'] <= '10'){
		$long_term_b_status = 'lot-full';
	}*/

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


<div class="container-fluid js-parking custom_cont custom_parkingcls test">
    <div class="row">
    	<header class="parking_header">
			<div class="parking_ribbon">
				<span class="parking_ribbon_icon">
					<svg aria-hidden="true" class="symbol symbol_car symbol_red">
						<use xlink:href="#car"></use>
					</svg>
				</span>
			</div>
			<h2 class="parking_title">
				<?php echo $title; ?>
				<span class="parking_title_label js-parking_time"> <time><?php echo $parking_op['updated']; ?></time></span>
			</h2>
			<p class="parking_caption"><?php echo $description; ?></p>
		</header>
    </div>
    <div class="row parking_body_row">
    	<div class="parking_body">
			<?php //if($hourly_garage['percentage'] != ''){ ?>
			<div class="parking_item js-parking-item  js-parking_class <?php echo $hourly_garage['class']; ?>" data-name="Hourly Garage">
				<header>
					<div class="parking_item_status_wrapper">
						<span class="parking_item_status js-parking_status"><?php print_r($hourly_garage['status']); ?></span>
					</div>
					<h3 class="parking_item_quantity"><span class="js-parking_percent"><?php print_r($hourly_garage['percentage']); ?></span>%<span class="parking_item_available"> available</span></h3>
					<div class="parking_item_details">
						<h4 class="parking_item_type">Hourly Garage</h4>
					</div>
                    <h5 class="parking_item_spaces"><?php print_r($hourly_garage['available']); ?> of <?= $hourly_garage['total'] ?> spaces available</h5>
					<h5 class="parking_item_cost"><?php print_r($hourly_garage1['parking_cost']); ?></h5>
				</header>
				<div class="parking_item_body">
					<p class="parking_item_caption"><?php print_r($hourly_garage1['description']); ?></p>
								<a class="parking_item_link" href="/to-from-bwi/parking/hourly-garage/">
							<span>
								Learn about our Hourly Garage
							</span>
							<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_gray">
								<use xlink:href="#arrow_right"></use>
							</svg>
						</a>
						</div>
			</div>
		<?php //}  
		//if($daily_garage['percentage'] != ''){
		?>
			<div class="parking_item js-parking-item  js-parking_class <?php echo $daily_garage['class']; ?>" data-name="Daily Garage">
				<header>
					<div class="parking_item_status_wrapper">
						<span class="parking_item_status js-parking_status"><?php print_r($daily_garage['status']); ?></span>
					</div>
					<h3 class="parking_item_quantity"><span class="js-parking_percent"><?php print_r($daily_garage['percentage']); ?></span>%<span class="parking_item_available"> available</span></h3>
					<div class="parking_item_details">
						<h4 class="parking_item_type">Daily Garage</h4>
					</div>
                    <h5 class="parking_item_spaces"><?php print_r($daily_garage['available']); ?> of <?= $daily_garage['total'] ?> spaces available</h5>
					<h5 class="parking_item_cost"><?php print_r($daily_garage1['parking_cost']); ?></h5>
				</header>
				<div class="parking_item_body">
					<p class="parking_item_caption"><?php print_r($daily_garage1['description']); ?></p>
								<a class="parking_item_link" href="/to-from-bwi/parking/daily-garage/">
							<span>
								Learn about our Daily Garage
							</span>
							<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_gray">
								<use xlink:href="#arrow_right"></use>
							</svg>
						</a>
				</div>
			</div>
			<?php //}  
		//if($express_parking['percentage'] != ''){
		?>
			<div class="parking_item js-parking-item  js-parking_class <?php echo $express_parking['class']; ?>" data-name="Express Parking">
				<header>
					<div class="parking_item_status_wrapper">
						<span class="parking_item_status js-parking_status"><?php print_r($express_parking['status']); ?></span>
					</div>
					<h3 class="parking_item_quantity"><span class="js-parking_percent"><?php print_r($express_parking['percentage']); ?></span>%<span class="parking_item_available"> available</span></h3>
					<div class="parking_item_details">
						<h4 class="parking_item_type">Express Parking</h4>
					</div>
                    <h5 class="parking_item_spaces"><?php print_r($express_parking['available']); ?> of <?= $express_parking['total'] ?> spaces available</h5>
					<h5 class="parking_item_cost"><?php print_r($express_parking1['parking_cost']); ?></h5>
				</header>
				<div class="parking_item_body">
					<p class="parking_item_caption"><?php print_r($express_parking1['description']); ?></p>
								<a class="parking_item_link" href="/to-from-bwi/parking/express-parking/">
							<span>
								Learn about our Express lot
							</span>
							<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_gray">
								<use xlink:href="#arrow_right"></use>
							</svg>
						</a>
				</div>
			</div>
			<?php //}  
		//if($long_term_parking_a['percentage'] != ''){
		?>
			<div class="parking_item js-parking-item  js-parking_class <?php echo $long_term_parking_a['class']; ?>" data-name="Long Term Lot A">
				<header>
					<div class="parking_item_status_wrapper">
						<span class="parking_item_status js-parking_status"><?php print_r($long_term_parking_a['status']); ?></span>
					</div>
					<h3 class="parking_item_quantity"><span class="js-parking_percent"><?php print_r($long_term_parking_a['percentage']); ?></span>%<span class="parking_item_available"> available</span></h3>
					<div class="parking_item_details">
						<h4 class="parking_item_type">Long Term Parking A</h4>
					</div>
                    <h5 class="parking_item_spaces"><?php print_r($long_term_parking_a['available']); ?> of <?= $long_term_parking_a['total'] ?> spaces available</h5>
					<h5 class="parking_item_cost"><?php print_r($long_term_parking_a1['parking_cost']); ?></h5>
				</header>
				<div class="parking_item_body">
					<p class="parking_item_caption"><?php print_r($long_term_parking_a1['description']); ?></p>
								<a class="parking_item_link" href="/to-from-bwi/parking/long-term-parking/">
							<span>
								Learn about our Long Term lots
							</span>
							<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_gray">
								<use xlink:href="#arrow_right"></use>
							</svg>
						</a>
				</div>
			</div>
			<?php //}  
		//if($long_term_parking_b['percentage'] != ''){
		?>
			<div class="parking_item js-parking-item  js-parking_class <?php echo $long_term_parking_b['class']; ?>" data-name="Long Term Lot B">
				<header>
					<div class="parking_item_status_wrapper">
						<span class="parking_item_status js-parking_status"><?php print_r($long_term_parking_b['status']); ?></span>
					</div>
					<h3 class="parking_item_quantity"><span class="js-parking_percent"><?php print_r($long_term_parking_b['percentage']); ?></span>%<span class="parking_item_available"> available</span></h3>
					<div class="parking_item_details">
						<h4 class="parking_item_type">Long Term Parking B</h4>
					</div>
                    <h5 class="parking_item_spaces"><?php print_r($long_term_parking_a['available']); ?> of <?= $long_term_parking_a['total'] ?> spaces available</h5>
					<h5 class="parking_item_cost"><?php print_r($long_term_parking_b1['parking_cost']); ?></h5>
				</header>
				<div class="parking_item_body">
					<p class="parking_item_caption"><?php print_r($long_term_parking_b1['description']); ?></p>
								<a class="parking_item_link" href="/to-from-bwi/parking/long-term-parking/">
							<span>
								Learn about our Long Term lots
							</span>
							<svg aria-hidden="true" class="symbol symbol_arrow_right symbol_gray">
								<use xlink:href="#arrow_right"></use>
							</svg>
						</a>
				</div>
			</div>
		<?php //}  
		?>
			
		</div>
		<?php if($message != ''){ ?>
		<div class="typography">
			<p>*<?php echo $message; ?></p>
		</div>
		<?php } ?>
    </div>
</div>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->