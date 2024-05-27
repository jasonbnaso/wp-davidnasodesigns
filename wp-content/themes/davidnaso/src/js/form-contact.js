// 'use strict';

$(function(){

	if($('#naso-designs-form').length > 0){ 
			
		$('#naso-designs-form').formValidation({
			framework: 'bootstrap',  
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			fields: {
				form_email: {
					validators: {
						notEmpty: {
							message: 'Please give an email address'
						},
						emailAddress: {
							message: 'Sorry, that doesnt look like an email address yet'
						}
					}
				},
				form_message: {
					validators: {
						notEmpty: {
							message: 'Please leave a message'
						},
						stringLength: {
							min: 6,
							message: 'The message must be more than 6 characters'
						}
					}
				}
			}
		}).on('success.form.fv', function(e) {
			e.preventDefault();
			function centerModal() {
				$(this).css('display', 'block');
				var $dialog  = $(this).find(".modal-dialog"),
				offset       = ($(window).height() - $dialog.height()) / 2,
				bottomMargin = parseInt($dialog.css('marginBottom'), 10);

				if(offset < bottomMargin) offset = bottomMargin;
				$dialog.css("margin-top", offset);
			}

			$(document).on('show.bs.modal', '.modal', centerModal);
			$(window).on("resize", function () {
				$('.modal:visible').each(centerModal);
			});
			
			$.ajax({
				type: 'POST',
				url: '/wp-content/themes/davidnaso/lib/form/send/send.php',
				data: {
					post_id: 			$('#form-post-id').val(),
					email: 				$('#form-email').val(),
					email_retype: 		$('#form-email-retype').val(),
					message: 			$('#form-message').val()
				},
				dataType: 'json',
			})
			.done(function(data) {
				if(data.status == 'ok'){
					$('#form-success-message-modal').modal('show');
					$('#form-email').val('');
					$('#form-message').val('');
					$('#form').data('formValidation').resetForm();
				}else{
					$('#form-error-message-modal').modal('show');
				}
			}).fail(function(){
				$('#form-error-message-modal').modal('show');
			});
			return false;
		});
	}
});