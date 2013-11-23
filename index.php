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
	<label for="email"メールアドレス：</label><br/>
	<input type="email" name="email" id="email"/ value=""/>
</div>
<input type="submit" name="submit" value="登録" />
</form>
</body>
</html>
