<?php

	$form_success_message 	= get_field('form_success_message');
	$form_title			  	= get_field('form_title');

	$form_form_heading		= get_field('form_form_heading');
	$form_column_heading	= get_field('form_column_heading');
	$form_address			= get_field('form_address'); 
?>

<!-- <script src="https://www.google.com/recaptcha/api.js?render=6Lc5VJUUAAAAAHbRgcbxOOtmuEZVKE3guZWtk2rD"></script> -->

<section id="naso-designs-form" class="contact-form">
	<div class="modal fade" id="form-success-message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-bg-image">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Thank you the message has been sent</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<?php echo $form_success_message; ?>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="form-error-message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Sorry the message could not be sent</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					The message could not be sent. Please contact us by telephone 319 338 0497
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
	<div class="form-bg-color section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
                    <h1 class="section-title"><?= $form_title; ?></h1>
                </div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6">
					<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" name="form" id="naso-designs-form">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="form_email" id="form-email" placeholder="Email address: *" class="form-control custom-form" />
									<input type="email" name="form_email_retype" id="form-email-retype" placeholder="Din e-postadress: *" class="form-control custom-form retypeEmail" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group form-group-message">
									<textarea name="form_message" id="form-message" rows="4" placeholder="Message:" class="form-control custom-form-message"></textarea>
								</div>
							</div>
							<div class="col-md-12">
	                    		<div class="form-group form-group-policy">
	                    			<input type="checkbox" name="form_agree" id="form-agree"> I understand the <a href="/davidnaso/privacy-policy-and-cookies/" target="_blank">privacy policies</a>
	                    		</div>
	                    	</div>
		                	<div class="col-md-12">
								<div class="form-group">
									<button type="submit" name="form_submit" id="form-submit" class="btn btn-outline-secondary">Send</button>
								</div>
							</div>
							<input type="hidden" name="form_post_id" id="form-post-id" value="<?php echo $post->ID; ?>" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
