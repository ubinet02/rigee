<?php
try {
	$code = $_GET ['code'];
	session_start();
	if (isset ( $_SESSION ['cart'] ) == true) {
		$cart = $_SESSION ['cart'];
		$kazu = $_SESSION ['kazu'];
		if (in_array ( $code, $cart ) == true) {
			print 'その商品はすでにカートに入っています。<br />';
			print '<a href="top.php">商品一覧に戻る</a>';
			exit ();
		}
	}
	$cart [] = $code;
	$kazu [] = 1;
	$_SESSION ['cart'] = $cart;
	$_SESSION ['kazu'] = $kazu;
} catch ( Exception $e ) {
	print $e->getMessage();
	exit ();
}
?>

カートに追加しました。
<br />
<br />
<a href="top.php">商品一覧に戻る</a>