<?php 
$title = get_sub_field('title');
$description = get_sub_field('description');
$types = get_sub_field('types');
//echo '<pre>';print_r($types);

 $count = count($types);
//print_r('Array includes only: '.$count);
$image = get_sub_field('image');

?>
<style>

/* ======================= Map query Section CSS Desktop ===================================  */

	.map-query-parent {
		/*padding: 80px 0px !important;*/
	}

	.map-query-row-section {
		padding: 80px 100px;
	}

	.map-query-content-section h2 {
		font-size: 2.625rem;
		line-height: 1.19048;
		font-weight: 900;
		margin: 0;
	}

	.map-query-info-image-section img {
		width: 70%;
		float: right;
	}

	.map-query-plan_link {
		font-weight: 700;
		border: 0;
		border-radius: 4px;
		font-size: 16px;
		padding: 16px 20px;
		text-align: center;
		transition: background 0.25s, border 0.25s, box-shadow 0.25s, color 0.25s, -webkit-transform 0.25s;
		transition: background 0.25s, border 0.25s, box-shadow 0.25s, color 0.25s, transform 0.25s;
		transition: background 0.25s, border 0.25s, box-shadow 0.25s, color 0.25s, transform 0.25s, -webkit-transform 0.25s;
		display: inline-block;
		margin-right: 8px;
		margin-bottom: 8px;
		background: #fff;
		box-shadow: inset 0 0 0 2px #da1a32;
		color: #111;
		background: none;
		text-decoration: none;
		line-height: 1.15;
		padding: 16px 20px !important;
		font-weight: 700;
	}

	.map-query-plan_link:focus,
	.map-query-plan_link:hover {
		background: #DA1A32;
		color: #fff;
	}

	.map-query-info_ribbon_icon {
		width: calc(100% + 60px);
		align-items: center;
		display: flex;
		margin-bottom: 20px;
	}

	span.map-query-info_ribbon_icon:after {
		background: #DA1A32;
		border-bottom: 3px solid #DA1A32;
		content: "";
		flex: 1;
	}

	.map-query-info_ribbon_icon {
		width: calc(100% + 40%);
		align-items: center;
		display: flex;
		margin-bottom: 20px;
	}


	.map-query-info_ribbon_icon:after {
		background: #DA1A32;
		border-bottom: 3px solid #DA1A32;
		content: "";
		flex: 1;
		z-index: 9999999;
	}

	.map-query-icon-section {
		padding-top: 40px;
	}

/* ======================= End Map query Section CSS Desktop ===================================  */

@media screen and (max-width: 1200px) {
	/* ======================= Map query Section CSS Media Query ===================================  */
		.map-query-row-section {
			padding: 80px 0px;
		}
	/* ======================= End Map query Section CSS Desktop ===================================  */


}

@media screen and (max-width: 992px) {

	/* ======================= Map query Section CSS Media Query ===================================  */
		.map-query-row-section-area {
			padding: 0 90px !important;
		}

		.first-section-are {
			padding: 0px !important;
		}

		.map-query-info_title {
			font-size: 2.25rem !important;

		}

		.map-query-info-image-section img {
			width: 100%;

		}


		.map-query-info_ribbon_icon {
			width: calc(100% + 12%);

		}
	/* ======================= End Map query Section CSS Media Query ================================  */


}
@media screen and (max-width: 835px) {
	/* ======================= Map query Section CSS Media Query ===================================  */
	.map-query-row-section-area {
			padding: 0 30px !important;
		}
		.map-query-icon-section {
    padding-top: 6px;
}
.map-query-info_ribbon_icon {
    width: calc(100% + 7%);
}
.map-query-row-section-area .second-section-are {
    width: 37%;
}
.map-query-row-section-area .first-section-are {
    width: 63%;
}
	/* ======================= End Map query Section CSS Media Query ===============================  */
}
@media screen and (max-width: 768px) {
	/* ======================= Map query Section CSS Media Query ===================================  */
	.map-query-row-section-area {
			padding: 0 30px !important;
		}
	/* ======================= End Map query Section CSS Media Query ===============================  */
}

@media screen and (max-width: 576px) {
	/* ======================= Map query Section CSS Media Query ===================================  */
		.map-query-info_ribbon_icon {
			width: calc(100% + 8%);
		}
		.container h2 {
    font-size: 1.75rem !important;
}
	/* ======================= End Map query Section CSS Media Query ===============================  */
}
@media screen and (max-width: 400px) {
	/* ======================= Map query Section CSS Media Query ===================================  */
	.second-section-are {
    display: none;
}
.map-query-row-section-area .first-section-are {
    width: 100%;
}
.map-query-info_ribbon_icon {
    width: calc(100% + 0%);
}
.info_dropdown_wrapper .custom-select {
    width: 300px !important;
}
	/* ======================= End Map query Section CSS Media Query ===============================  */
}

</style>

<!-- ==================Map Query Section======================== -->

<div class="container map-query-parent">
<div class="map-query-row-section">
    <div class="row map-query-row-section-area ">
	
		
	
		<div class="col-sm-6 first-section-are">
		    <div class="map-query-icon-section">
				<span class="map-query-info_ribbon_icon"><svg class="symbol symbol_traveler symbol_red"><use xlink:href="#traveler"></use></svg></span>
			</div>
			<div class="map-query-content-section">
				<h2 class="map-query-info_title"><?php echo $title; ?></h2>
				<p class="map-query-info_caption"><?php echo $description; ?></p>
				
				<div class="map-query-info_items">
          <?php if($count > 1){ ?>
					<div class="fs-dropdown_wrapper info_dropdown_wrapper">
						<div class="custom-select" style="width:auto;">
						  
						  <div class="select-selected">Choose a Concourse</div>
						  <div class="select-items select-hide">
						  	<?php foreach($types as $type){ ?>
						  	<div><a href="<?php echo $type['course']['url']; ?>" target="<?php echo $type['course']['target']; ?>"><?php echo $type['course']['title']; ?></a></div>
						  	<?php } ?>
						  </div>
						</div>
					</div>
        <?php }elseif($count == 1){ 
          $links = $types['0']['course'];
          ?>
          <a class="map-query-plan_link" href="<?php echo $links['url']?>" target="<?php echo $links['target']?>" aria-title="<?php echo $links['title']?>">
            <span><?php echo $links['title']?></span>
          <svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg>
          </a>
        <?php  } ?>
				</div>
			</div>
		</div>
		<div class="col-sm-6 second-section-are">
			<div class="map-query-info-image-section">
				<img class="map-query-info_image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			</div>
		</div>
		</div>
    </div>
</div>

<!-- ==================end Map Query Section======================== -->


























<!-- <div class="container-fluid custom_cont facts_container sssssssssssssssssssssssss">
    <div class="row">
    	<div class="info_wrapper">
				<img class="info_image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
			<div class="info_body">
				<header class="info_header">
					<div class="info_ribbon">
						<span class="info_ribbon_bubble">
							<span class="info_ribbon_icon"><svg class="symbol symbol_traveler symbol_red"><use xlink:href="#traveler"></use></svg></span>
						</span>
					</div>
					<div class="info_heading">
						<h2 class="info_title"><?php echo $title; ?></h2>
						<p class="info_caption"><?php echo $description; ?></p>
					</div>
				</header>
				<div class="info_items">
          <?php if($count > 1){ ?>
					<div class="fs-dropdown_wrapper info_dropdown_wrapper">
						<div class="custom-select" style="width:auto;">
						  
						  <div class="select-selected">Select Your Concourse</div>
						  <div class="select-items select-hide">
						  	<?php foreach($types as $type){ ?>
						  	<div><a href="<?php echo $type['course']['url']; ?>" target="<?php echo $type['course']['target']; ?>"><?php echo $type['course']['title']; ?></a></div>
						  	<?php } ?>
						  </div>
						</div>
					</div>
        <?php }elseif($count == 1){ 
          $links = $types['0']['course'];
          ?>
          <a class="plan_link" href="<?php echo $links['url']?>" target="<?php echo $links['target']?>" aria-title="<?php echo $links['title']?>">
            <span><?php echo $links['title']?></span>
          <svg class="symbol symbol_arrow_right symbol_red"><use xlink:href="#arrow_right"></use></svg>
          </a>
        <?php  } ?>
				</div>
			</div>
		</div>
    </div>
</div> -->


<style>

</style>

