<?php

	/*
	Template name: Home
	*/

	get_header();

    $hero_image             = get_field('hero_image');
    $hero_title             = get_field('hero_title', false, false);
    $hero_under_title       = get_field('hero_under_title');

    $products_title         = get_field('products_title');
    // $products_title         = get_field('products_title');
    $product_large_image    = get_field('product_large_image');
    $product_large_title    = get_field('product_large_title');
    $product_large_text     = get_field('product_large_text');
    $product_large_button_link      = get_field('product_large_button_link');
    $product_large_image_height_class   = get_field('product_large_image_height_class');

    $products_repeater      = get_field('products_repeater');

    $where_we_work_repeater   = get_field('where_we_work_repeater');


    $about_us_title     = get_field('about_us_title');
    $about_us_image     = get_field('about_us_image');
    $about_us_text      = get_field('about_us_text');
    $about_us_button_link      = get_field('about_us_button_link');
    $about_us_under_text_repeater      = get_field('about_us_under_text_repeater');

    $form_choice      = get_field('form_choice'); 
    $contact_form_seven_dn     = get_field('contact_form_seven_dn');



?>

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
                        <a style="z-index: 1000;position:relative; display: block;text-align: right;font-weight:bold;font-size:30px;" href="#contactForm">Click here to contact us</a>
                    </div>
                </div>
            </div>
            <svg viewBox="0 0 100 100" preserveAspectRatio="none" fill="#fbf7f4" class="hero-svg">
                 <polygon points="0,100 100,0 100,100" />
            </svg>
        </div>
    </section>

<?php endif; ?>

<?php if ($products_repeater) : ?>

    <section class="products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title"><?= $products_title; ?></h1>
                </div>
                <div class="col-sm-4">
                    <div class="product-large-image <?= $product_large_image_height_class; ?>" style="background-image: url('<?= $product_large_image['url']; ?>');">
                        <div class="product">
                            <div class="product-title">
                                <p><?= $product_large_title; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <?php foreach ($products_repeater as $k => $r) : ?>
        
                            <div class="col-sm-6 float-left custom-column">
                                <div class="product-image grow <?= $r['product_image_height_class']; ?>" style="background-image: url('<?= $r["product_image"]['url']; ?>');">
                                        <div class="product">
                                            <div class="product-title">
                                                <p><?= $r['product_title']; ?></p>
                                            </div>
                                        </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif; ?>

<div class="divider div-transparent div-stopper"></div>

<?php if ($where_we_work_repeater) : ?>

    <section class="where-we-work section-padding">
        <div class="container">
            <div class="row">
                <?php foreach ($where_we_work_repeater as $k => $r) : ?>
                    <div class="col-sm-3">
                        <div class="where-icon">
                            <?= $r['icon']; ?>
                        </div>
                        <div class="where-text">
                            <?= $r['text']; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

<div class="divider div-transparent div-stopper"></div>

<?php if($about_us_image && $about_us_text) : ?>

    <section class="home-about-us section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="section-title"><?= $about_us_title; ?></h1>
                </div>
                <div class="col-sm-6 home-about-us-image-wrapper">
                    <img class="img-fluid" src="<?= $about_us_image['url']; ?>" alt="<?= $about_us_image['alt']; ?>">
                </div>
                <div class="col-sm-6 home-about-us-text">
                    <?= $about_us_text; ?>
                <a class="btn btn-outline-secondary" href="<?= $about_us_button_link; ?>" role="button">Read more about us!</a>
                </div>
                <?php if($about_us_under_text_repeater) : ?>
                        <?php foreach($about_us_under_text_repeater as $k => $r) : ?>
                        <div class="col-sm-6 home-about-us-text mt-5">
                            <?= $r['about_us_under_text']; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
   <div class="divider div-transparent div-stopper"></div>

<?php endif; ?>

<section class="section-padding"  id="contactForm" style="background-color:#fbf7f4;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h1 class="section-title">Contact us</h1>
            </div>
            <?php echo $contact_form_seven_dn; ?>
        </div>
    </div>
</section>
  


<?php
	get_footer();
?>						
