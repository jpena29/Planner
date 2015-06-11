$(document).ready(function () {
	/* keep register form and hide button hidden from user */
	$('#register').hide();
	$('#secondbutton').hide();

	/* bring up register form and hide button */
	$('#signup').click(function () {
		$('#buttonwrapper').hide();
		$('#secondbutton').show();
		$('#register').show();
	});
	$('#hide').click(function () {
		$('#secondbutton').hide();
		$('#register').hide();
		$('#buttonwrapper').show();
	});

	$('#loginform').validate( {
		rules: {
			field1: {
				required: true,
				email: true
			},
			field2: {
				required: true,
				minlength: 8
			}
		}
	});
});
