<?php

	/*
	Template name: Privacy policy
	*/

	get_header();

	$privacy_policy_text = get_field('privacy_policy_text');

?>


<main class="privacy-policy">
	<section class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-8 offset-sm-2">
					<?= $privacy_policy_text; ?>
				</div>					
			</div>
		</div>
	</section>
</main>





<?php
	get_footer();
?>						


