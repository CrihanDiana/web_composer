<?php
	require_once("vendor/vlucas/valitron/src/valitron/Validator.php");
	$v = new Valitron\Validator($_POST);
	$v->rule('required', ['name', 'email', 'date', 'telephone', 'age', 'password', 'confirm' ]);
	$v->rule('email', 'email', 'date', 'date');
	$v->rule('lengthBetween', 'name', 3, 15);
	$v->rule('regex', '\'/^\+373[0-9]{8,8}$/\'');
	$v->rules([
    'min' => [['age', 1]],
    'max' => [['age', 100]],
    'integer' => [['age', true]]
]);
	$v->rule('dateFormat', 'dn', 'Y-m-d');
$v->rule('required', ['name', 'email', 'password', 'confirm']);
$v->rules([
  'equals' => [['password', 'confirm']],
  'lengthBetween' => [['password', 5, 20]]
]);

	if($v->validate()) {
	    echo "Yay! We're all good!";
	} else {
	    // Errors
	    print_r($v->errors());
	}
?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="POST">
	Nume<input type="text" name="name">
	<br>
	email<input type="email" name="email">
	<br>
	Telefon<input type="telephone" name="phone">
	<br>
	Virsta<input type="number" min = "0" max="100" name="age">
	<br>
	Data Nasterii<input type="date" name="date">
	<br>
	Parola<input type="password" name="password">
	Confirmati Parola<input type="password" name="confirm">
	<button>Confirm</button>

</form>
</body>
</html>