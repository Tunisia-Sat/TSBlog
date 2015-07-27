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
    $('#install-form')
    .formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            host: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    regexp: {
                        regexp: /^[a-z0-9./:]{5,}$/,
                        message: 'Fomat incorrecte'
                    }
                }
            },
            dbname: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    regexp: {
                        regexp: /^[a-z0-9-_]+$/,
                        message: 'Only Alpha-numeric, "-" and "_" accepted'
                    }
                }
            },
            user: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'Only Alpha-numeric are accepted'
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
            url: 'contact.php', // form action url
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
});