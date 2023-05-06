
<?php 

include "../Model/Pub.php";
include "../Controller/PubC.php";

if(isset($_POST['inscri']))
{
if( isset($_POST['nom']) and isset($_POST['datep']) and isset($_POST['email'])  and isset($_POST['nomut']) and isset($_POST['datep'])){
$pub=new pub($_POST['nom'],$_POST['datep'],$_POST['email'],$_POST['nomut'],$_POST['datep']);

 

//Partie3
$pubC = new pubC();
$pubC->ajoutePub($pub);


echo "<script type='text/javascript'>";
echo "alert('You are registered! Log In!');
window.location.href='read.php';";
echo "</script>";
    
}else{
    echo "vérifieer les champs";
    die();
}
//*/
}
?>