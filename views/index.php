<!doctype html>
<html>
	<head>
		<title>This is a new title</title>
	</head>

	<body>
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
			<input type="text" name ="username">
			<input type="submit" value="send">
		</form>

		<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>
