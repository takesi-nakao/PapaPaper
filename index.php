<?php
function e($str, $charset = 'UTF-8') {
	print(htmlspecialchars($str, ENT_QUOTES, $charset));
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<title>PapaPaper - Registration Form</title>
</head>
<body>
<h1>PapaPaper ユーザ登録</h1>
<p>お名前とメールアドレスを入力して、<strong>登録ボタン</strong>を押してください</p>
<form method="post" action="regist.php" enctype="multipart/form-data" >
<div class="container">
	<label for="name">お名前：</label><br/>
	<input type="text" name="name" id="name" value=""/>
</div>
<div class="container">
	<label for="email">メールアドレス：</label><br/>
	<input type="email" name="email" id="email" value=""/>
</div>
<input type="submit" name="submit" value="登録" />
</form>

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
    echo "<h3>Your're registered!</h3>";
    }
    // Retrieve data
    $sql_select = "SELECT * FROM registration_tbl";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
        echo "<h2>People who are registered:</h2>";
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
