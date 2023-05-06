<?php
include "../Controller/PubC.php";

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $pubC = new PubC();
    $pubC->supprimerpub($id);
    header('Location: read.php');
}
?>
