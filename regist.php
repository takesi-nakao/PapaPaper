<?php
function enc($str, $charset = 'UTF-8') {
	print(htmlspecialchars($str, ENT_QUOTES, $charset));
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>PapaPaper - Registration Result</title>
</head>
<body>
<h1>登録ありがとうございました</h1>
<p><?php print($_POST['name']); ?></p>
<p><?php print($*POST['email']); ?></p>

</body>
</html>
