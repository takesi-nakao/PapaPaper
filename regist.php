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

<?php

//	print(enc($_POST['email']);
	
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
        die(var_dump($e));
    }
	
	// 重複チェック
    $sql_select = "SELECT * FROM registration_tbl WHERE email = {$_POST['email']}";
	$stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) === 0) {
/*
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
			die(var_dump($e));
		}
		else {
*/
			exit('登録データが入力されていません');
//		}
	}
	else {
		exit("すでに登録済みのメールアドレスです<br/>メールアドレス：{$_POST['email']}");
	}
?>

<h1>登録ありがとうございました</h1>
<p><?php print('お名前：'.$_POST['name']); ?></p>
<p><?php print('メールアドレス：'.$_POST['email']); ?></p>

</body>
</html>
