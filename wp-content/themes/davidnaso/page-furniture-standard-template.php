<?php

	/*
	Template name: Latest
	*/

	get_header();

	$products_content_repeater = get_field('products_content_repeater');

?>

<main class="products main-padding">
    
	<?php foreach($products_content_repeater as $k => $r) : ?>
		<section class="products-content section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 content content-text">
						<h3><?= $r['products_text']; ?></h3>
					</div>
					<div class="col-sm-6 content">
					    <div style="width:100%;margin-bottom:30px;">
                            <a style="display: block;text-align: center;font-weight:bold;font-size:30px;" href="/contact#contactForm">Click here to contact us</a>
                        </div>
						<img class="img-fluid" src="<?= $r['products_image']['url']; ?>" alt="<?= $r['product_image']['alt']; ?>">
					</div>
				</div>
			</div>
		</section>
	<?php endforeach; ?>
</main>





<?php
	get_footer();
?>						


