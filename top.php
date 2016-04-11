<img src="./rigee-bicycle/logo-rigee2.png">
<img src="./rigee-bicycle/logo-t.png">
<img src="./rigee-bicycle/nav01.png">
<img src="./rigee-bicycle/nav04.png">
<a href="cartlook.php">Cart</a>
<a href="./shop/member_login.html">Login</a><br>
<?php
try
{

	$dsn='mysql:dbname=rigee;host=localhost;charset=utf8';
	$user='root';
	$password='';
	$dbh=new PDO($dsn,$user,$password);
	$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$sql='SELECT * FROM mst_product';
	$stmt=$dbh->prepare($sql);
	$stmt->execute();

	$dbh=null;

	while(true)
	{
		$rec=$stmt->fetch(PDO::FETCH_ASSOC);
		if($rec==false)
		{
			break;
		}
		$data[] = $rec;
	}

	echo 'on sale<a href="product.php?code='.$data[date('N')-1]['code'].'"><img src="./rigee-bicycle/'.$data[date('N')-1]['img'].'"></a><br>';

	array_splice($data, date('N')-1, 1);

	for($i=0; $i<count($data); $i++){
		echo '<a href="product.php?code='.$data[$i]['code'].'"><img src="./rigee-bicycle/'.$data[$i]['img'].'"></a><br>';
	}
}
catch (Exception $e)
{
	echo $e->getMessage();
	exit();
}
?>