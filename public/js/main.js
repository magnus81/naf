

$(document).ready(function() {
    console.log( "ready!" );

    $('#ajax-test').submit(function(e) {
    	e.preventDefault();
		$.post('/ajaxTest', { username: 'SuperUser' })
			.done(function(data) {
				console.log(data);
			}
		);
    });
});
