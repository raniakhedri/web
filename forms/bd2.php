
<?php
$servername='localhost';
$username='root';
$password='';
$dbname='confirmationwin';
try{
$pdo2= new PDO(
"mysql:host=$servername;dbname=$dbname",
$username,
$password
);
$pdo2->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo2->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
echo "";

	}
catch(PDOException $e)
{echo "failed:" .$e->getMessage();
}
?>