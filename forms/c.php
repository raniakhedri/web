
<?php 

include "../Model/client.php";
include "../Controller/ClientC.php";

if(isset($_POST['inscri']))
{
if( isset($_POST['nom']) and isset($_POST['name_account']) and isset($_POST['email'])  and isset($_POST['tel']) and isset($_POST['event'])){
$client=new Client($_POST['nom'],$_POST['email'],$_POST['tel'],$_POST['name_account'],$_POST['event']);

 

//Partie3
$clientC = new ClientC();
$clientC->ajouterclients($client);


echo "<script type='text/javascript'>";
echo "alert('You are registered! Log In!');
window.location.href='tables.php';";
echo "</script>";
    
}else{
    echo "vérifieer les champs";
    die();
}
//*/
}
?>