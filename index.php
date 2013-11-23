<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>PapaPaper - test</title>
</head>
<body>
<h1>
パパペパ
</h1>
<?php
print('PHPの文字列です');
?>
<h1>
パパペパ2
</h1>
<?php
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
    // Insert registration info
	print('Success to access MySQL!');
?>
</body>
</html>
