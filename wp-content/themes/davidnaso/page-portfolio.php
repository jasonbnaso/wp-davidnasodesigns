<?php

	/*
	Template name: Portfolio
	*/

	get_header();

	$portfolio_title 	= get_field('portfolio_title');
	$portfolio_images_repeater 	= get_field('portfolio_images_repeater');

?>
<!-- https://stackoverflow.com/questions/11173827/float-images-upwards-with-css -->
<main class="portfolio">
	<?php if($portfolio_images_repeater) : ?>
		<section class="images">
			<div class="container">
			    <div class="row">
			    	<div class="col-sm-12">
			    	    <h1 class="section-title portfolio-title"><?= $portfolio_title; ?></h1>
			    	    <div style="width:100%;margin-bottom: 30px;">
                            <a style="display: block;text-align: center;font-weight:bold;font-size:30px;" href="/contact#contactForm">Click here to contact us</a>
                        </div>
			    	</div>
			    	<div class="image-container"> 
			    		<?php foreach ($portfolio_images_repeater as $k => $r) : ?>
				    		<img class="port-image portfolio-image" src="<?= $r['image']['url']; ?>" alt="<?= $r['image']['alt']; ?>" >
				    		<!-- The Modal -->
				    		<div id="myModal" class="modal">
				    		    <div style="color: #ca6;font-size:30px" id="caption"></div> 
								<img class="modal-content" id="modalImage">
								<div class="close-modal">&times;</div>
				    		</div>
				    	<?php endforeach; ?>
			    	</div>
			    </div>
			</div>
		</section>
	<?php endif; ?> 
</main>





<?php
	get_footer();
?>						
