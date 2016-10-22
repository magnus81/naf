

$(document).ready(function() {
    console.log( "ready!" );

    $('#ajax-test').submit(function(e) {
    	e.preventDefault();
		$.post(
			'/ajaxTest',
			{ username: $('#ajax-username').val() },
			function(data) {
				$('#ajax-result').text(data.username);
				$('#ajax-result').show();
			},
			'json'
		);
    });
});
