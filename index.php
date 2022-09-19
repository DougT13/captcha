<!DOCTYPE html>
<html>
<head>

	<title>Captcha</title>
</head>
<body>
	<img src="captcha.php?l=150&a=50&tf=20&ql=5">

	<form action="validar.php" name="form" method="post">
   		<input type="text" name="palavra"  />
   		<input type="submit" value="Validar Captcha" />
	</form>
</body>
</html>