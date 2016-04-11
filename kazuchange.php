<?php
session_start();

$max = $_POST['max'];

for($i=0; $i<$max; $i++){
	if(preg_match("/^[0-9]+$/", $_POST['kazu'.$i])==0){
		print 'This is not number.';
		print '<a href="cartlook.php">back</a>';
		exit();
	}
	if($_POST['kazu'.$i]<1 || 10<$_POST['kazu'.$i]){
		print 'please 1<=kazu<=10';
		print '<a href="cartlook.php">back</a>';
		exit();
	}
	$kazu[] = $_POST['kazu'.$i];
}

$cart = $_SESSION['cart'];

for($i=$max;$i>=0;$i--){
	if(isset($_POST['delete'.$i])){
		array_splice($cart, $i, 1);
		array_splice($kazu, $i, 1);
	}
}

$_SESSION['cart'] = $cart;
$_SESSION['kazu'] = $kazu;

header('Location:cartlook.php');
?>