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

		<a href="<?php  echo route('testpage'); ?>">Here is a link for you</a>
		
	</body>
</html>