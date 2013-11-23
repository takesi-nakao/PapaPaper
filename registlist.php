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
<script laguage="JavaScript"><!--
function changeImg()
{
　　　　location.reload();
}
// --></script>
</head>
<body onLoad="setInterval('changeImg()',1000*60)">

<h1>登録状況</h1>
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
        die(var_dump($e));
    }

	// Retrieve data
    $sql_select = "SELECT * FROM registration_tbl";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
		echo "<h1>今の登録件数：".count($registrants)."人</h1>";
        echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>Date</th></tr>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['name']."</td>";
            echo "<td>".$registrant['email']."</td>";
            echo "<td>".$registrant['date']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
?>
</body>
</html>
