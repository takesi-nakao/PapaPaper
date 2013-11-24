<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>パパペパ！　パパのためのイクメン情報サイト</title>
<link rel="stylesheet" type="text/css" href="css/cssreset.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/cssfonts.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/default.css" media="all" />
<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45975276-1', 'papapaper.co');
  ga('send', 'pageview');

</script>

</head>
<body>
<div id="wrap_all">
    <header>
        <div id="logo_head"><img src="images/logo_head.png" width="509" height="259" alt="パパペパ"></div>
        <p id="orei">ご登録ありがとうございました！</p>
    </header>
</div>

<?php
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
/*
Database=pppp;Data Source=ap-cdbr-azure-east-b.cloudapp.net;User Id=b623d2a9e26e87;Password=fa4ba3e9
*/
    $host = "ap-cdbr-azure-east-b.cloudapp.net";
    $user = "b623d2a9e26e87";
    $pwd = "fa4ba3e9";
    $db = "pppp";
    // Connect to database.
    try {
        $conn = new PDO( "mysql:host=$host;dbname=$db", $user, $pwd);
        $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch(Exception $e){
        exit(var_dump($e));
    }
	// Insert registration info
	if(!empty($_POST)) {
		try {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$date = date("Y-m-d");
			// Insert data
			$sql_insert = "INSERT INTO registration_tbl (name, email, date) 
				   VALUES (?,?,?)";
			$stmt = $conn->prepare($sql_insert);
			$stmt->bindValue(1, $name);
			$stmt->bindValue(2, $email);
			$stmt->bindValue(3, $date);
			$stmt->execute();
		}
		catch(Exception $e) {
			exit(var_dump($e));
		}
	}

?>

<!--
<p><?php print('お名前：'.$_POST['name']); ?></p>
<p><?php print('メールアドレス：'.$_POST['email']); ?></p>
-->

</body>
</html>
