$(document).ready(function () {
    //Auto hide navbar on click
    $(".navbar-nav li a").click(function(event) {
        $(".navbar-collapse").collapse('hide');
    });

    $(".navbar-brand a").click(function(event) {
        $(".navbar-collapse").collapse('hide');
    });
    
    //hide anchor name on url
    $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
            $('html,body').animate({
                    scrollTop: target.offset().top - 80
                }, 1000);
                return false;
            }
        }
    });

    //FormValidation
    $(document).ready(function() {
		// You don't need to care about this function
		// It is for the specific demo
		function adjustIframeHeight() {
			var $body   = $('body'),
					$iframe = $body.data('iframe.fv');
			if ($iframe) {
				// Adjust the height of iframe
				$iframe.height($body.height());
			}
		}

		$('#installationForm')
		.formValidation({
			framework: 'bootstrap',
			icon: {
				valid: 'glyphicon glyphicon-ok',
				invalid: 'glyphicon glyphicon-remove',
				validating: 'glyphicon glyphicon-refresh'
			},
			// This option will not ignore invisible fields which belong to inactive panels
			excluded: ':disabled',
			fields: {
				name: {
					validators: {
						notEmpty: {
							message: 'Required'
						}
					}
				},
				slogon: {
					validators: {
						notEmpty: {
							message: 'Required'
						}
					}
				},
				host: {
					validators: {
						notEmpty: {
							message: 'Required'
						},
						regexp: {
							regexp : /^(([a-zA-Z0-9\-]{3,}(\.)){2})([a-z]{2,4}){1}((\.)([a-z]{2,4}))?|(localhost)|(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$/,
							message: 'The server adress is not valid'
						}
					}
				},
				dbname: {
					validators: {
						notEmpty: {
							message: 'Required'
						}
					}
				},
				user: {
					validators: {
						notEmpty: {
							message: 'Required'
						}
					}
				},
				pass: {
					validators: {
						notEmpty: {
							message: 'Required'
						}
					}
				},
				firstname: {
					validators: {
						notEmpty: {
							message: 'Required'
						},
						stringLength: {
							min: 3,
							max: 20,
							message: '3 to 20 characters max'
						},
						regexp: {
							regexp: /^[a-zA-Z ]{3,20}$/,
							message: 'Only Alpha-numeric are accepted'
						}
					}
				},
				lastname: {
					validators: {
						notEmpty: {
							message: 'Required'
						},
						stringLength: {
							min: 3,
							max: 20,
							message: '3 to 20 characters'
						},
						regexp: {
							regexp: /^[a-zA-Z ]{3,20}$/,
							message: 'Only Alpha-numeric and whitespaces are accepted'
						}
					}
				},
				email: {
					validators: {
						notEmpty: {
							message: 'Required'
						},
						regexp: {
							regexp: /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-z0-9_][-a-z0-9_]*(\.[-a-z0-9_]+)*\.(aero|arpa|biz|com|coop|edu|gov|info|int|mil|museum|name|net|org|pro|travel|mobi|[a-z][a-z])|([0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}))(:[0-9]{1,5})?$/i,
							message: 'Invalid mail adress'
						}
					}
				},
				adminpass: {
					validators: {
						notEmpty: {
							message: 'Required'
						},
						stringLength: {
							min: 8,
							max: 20,
							message: '8 to 20  characters'
						}
					}
				},
				confadminpass: {
					validators: {
						notEmpty: {
							message: 'Required'
						},
						identical: {
							field: 'adminpass',
							message: 'The password and its confirm are not the same'
						}
					}
				}
			}
		})
		.bootstrapWizard({
			tabClass: 'nav nav-pills',
			onTabClick: function(tab, navigation, index) {
				return validateTab(index);
			},
			onNext: function(tab, navigation, index) {
				var numTabs    = $('#installationForm').find('.tab-pane').length,
					isValidTab = validateTab(index - 1);
				if (!isValidTab) {
					return false;
				}

				if (index === numTabs) {
					$('#completeModal').modal();
				}

				return true;
			},
			onPrevious: function(tab, navigation, index) {
				return validateTab(index + 1);
			},
			onTabShow: function(tab, navigation, index) {
				// Update the label of Next button when we are at the last tab
				var numTabs = $('#installationForm').find('.tab-pane').length;
				$('#installationForm')
					.find('.next')
						.removeClass('disabled')
						.find('a')
						.html(index === numTabs - 1 ? 'Install' : 'Next');

				adjustIframeHeight();
			}
		})
		.on('success.form.fv', function(e) {
			// Prevent form submission
			e.preventDefault();

			var $form = $(e.target),
				fv    = $form.data('formValidation');
			var submit = $('#envoyer');  // submit button
			var alert = $('#alert'); // alert div for show alert message
			$('head').append('<link rel="stylesheet" type="text/css" href="css/loading.css" />');
			submit.html('<i class="fa fa-refresh fa-refresh-animate"></i> En cours');
			$.ajax({
				url: 'install.php', // form action url
				type: 'POST', // form submit method get/post
				dataType: 'html', // request type html/json/xml
				data: $form.serialize(),
				success: function(result) {
					var $message;
					if (result) {
						$message = '<div class="alert alert-success"><div class="row"><div class="col-xs-8 col-xs-offset-2 h-center"><i class="fa fa-check-circle fa-2x"></i> <strong>Message envoy&eacute;!</strong><br />J\'essaierai de vous r&eacute;pondre assez rapidement.</div></div></div>';
					}
					else {
						$message = '<div class="alert alert-danger"><div class="row"><div class="col-xs-8 col-xs-offset-2 h-center"><i class="fa fa-times-circle fa-2x"></i> <strong>Oops!</strong> Un petit probl&egrave;me technique<br />Essayez plus tard ou envoyez un mail directement<br />contact@marwein.info</div></div></div>';
					}

					$form.replaceWith($message).fadeIn(10000);
					$(".modal-content").append('<div class="modal-footer h-center"><button type="reset" class="btn btn-primary" id="fermer" name="Fermer" value="Fermer" data-dismiss="modal">Fermer</button></div>');
					$form.destroy();
				},
				error: function(e) {
					console.log(e)
				}
			});
		});

		function validateTab(index) {
			var fv   = $('#installationForm').data('formValidation'),
				// The current tab
				$tab = $('#installationForm').find('.tab-pane').eq(index);

			fv.validateContainer($tab);

			var isValidStep = fv.isValidContainer($tab);
			if (isValidStep === false || isValidStep === null) {
				return false;
			}

			return true;
		}
	});
});