<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
		<title>naf - php</title>
	</head>

	<body>
		<div class="container-fluid">
			<h1>It works!</h1>

			<p>This is <?php echo $test; ?></p>

			<form action="/" method="post">
				<input type="text" name="username">
				<input type="submit" value="Send">
			</form>

			<br>

			<a href="<?php  echo route('testpage'); ?>">Here is a link for you</a>

			<p>The session is: <?php echo $session; ?></p>

			<h3>This is an AJAX request</h3>

			<form id="ajax-test">
				<input type="text" id="ajax-username" name ="username">
				<input type="submit" value="send">
			</form>

			<br>

			<div class="alert alert-success" role="alert" id="ajax-result" style="display: none;">

			</div>
		</div>

		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>
