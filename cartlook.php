<?php
session_start();
if (isset ( $_SESSION ['cart'] )) {
	$cart = $_SESSION ['cart'];
	$kazu = $_SESSION ['kazu'];
	$max = count($cart);

	$dsn = 'mysql:dbname=rigee;host=localhost;charset=utf8';
	$user = 'root';
	$password = '';
	$dbh = new PDO ( $dsn, $user, $password );
	$dbh->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo '<form method="post" action="kazuchange.php">';
	echo '<table><tr><td>name</td><td>model</td><td>price</td><td>price2</td><td>kazu</td><td>delete</td></tr>';

	for($i = 0; $i < count ( $cart ); $i ++) {

		$sql = 'SELECT * FROM mst_product where code=?';
		$stmt = $dbh->prepare ( $sql );
		$data [0] = $cart [$i];
		$stmt->execute ( $data );

		$rec = $stmt->fetch ( PDO::FETCH_ASSOC );

		echo '<tr><td>' . $rec ['name'] . '</td><td>' . $rec ['model'] . '<td>' . $rec ['price'] . '</td><td>' . $rec ['price2'].'</td>
				<td><input type="text" name="kazu'.$i.'" value="'.$kazu[$i].'"></td><td><input type="checkbox" name="delete'.$i.'"></td></tr><br>';
	}
	echo '<input type="hidden" name="max" value="'.$max.'">';
	echo '<tr><td><input type="submit" value="change"></td></tr>';
	echo '</table></form>';

	$dbh = null;

} else {
	echo 'no cart';
}