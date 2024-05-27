<?php

	/*
	Template name: Review
	*/

	get_header();

	$hero_image         = get_field('hero_image');
    $hero_title         = get_field('hero_title', false, false);
    $hero_under_title   = get_field('hero_under_title');

	$about_us_repeater   = get_field('about_us_repeater');

	$form_choice      = get_field('form_choice');
	$contact_form_seven_dn     = get_field('contact_form_seven_dn');


?>

<main class="about-us">

	<?php if ($hero_image) : ?>

	<style>
	    .hero-image{background-image: url('<?=$hero_image['sizes']['medium'];?>');}
	    @media only screen and (min-width: 300px){.hero-image{background-image: url('<?=$hero_image['sizes']['medium_large'];?>');}}
	    @media only screen and (min-width: 768px) {.hero-image{background-image: url('<?=$hero_image['url'];?>');}}
	</style>

	<section class="hero">
	    <div class="hero-image">
	        <div class="container">
	            <div class="hero-title">
	                <h1><?= $hero_title; ?></h1>
	                <h5><?= $hero_under_title; ?></h5> 
	                <div style="width:100%;">
                        <a style="z-index: 1000;position:relative; display: block;text-align: right;font-weight:bold;font-size:30px;" href="/contact#contactForm">Click here to contact us</a>
                    </div>
	            </div>
	        </div>
	        <svg viewBox="0 0 100 100" preserveAspectRatio="none" fill="#fbf7f4" class="hero-svg">
	             <polygon points="0,100 100,0 100,100" />
	        </svg>
	    </div>
	</section>

	<?php endif; ?>

	<?php if($about_us_repeater) :?> 

		<?php foreach($about_us_repeater as $k => $r) :?>

			<section class="about-us-content section-padding">
				<div class="container">
					<div class="row">
						<div class="col-md-6 content">
							<img class="img-fluid" src="<?php echo $r['image']['url']; ?>" alt="<?php echo $r['image']['alt']; ?>">
						</div>
						<div class="col-md-6 content">
							<?php echo apply_filters('the_content' ,$r['text']); ?>
						</div>
					</div>
				</div>
			</section>

		<?php endforeach; ?>

	<?php endif; ?>
	


</main>


<?php
	get_footer();
?>						

