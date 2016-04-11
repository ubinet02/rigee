<?php
$code = $_GET['code'];

try
{

	$dsn='mysql:dbname=rigee;host=localhost;charset=utf8';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql='SELECT * FROM mst_product WHERE code=?';
	$stmt=$dbh->prepare($sql);
	$data[] = $code;
	$stmt->execute($data);

	$dbh=null;

	$rec=$stmt->fetch(PDO::FETCH_ASSOC);

	echo '<img src="./rigee-bicycle/'.$rec['img'].'"><br>';
	echo $rec['name'].'<br>';
	echo $rec['model'].'<br>';
	echo $rec['price'].'<br>';
	echo $rec['price2'].'<br>';
	echo $rec['size'].'<br>';
	echo $rec['etc'].'<br>';
	echo '<a href="cartin.php?code='.$rec['code'].'">cart in</a>';
}
catch (Exception $e)
{
	print 'ただいま障害により大変ご迷惑をお掛けしております。';
	exit();
}

?>