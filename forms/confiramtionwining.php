<?php
require 'bd.php';
require 'bd1.php';
require 'bd2.php';
$id = $_GET['id'];
$stmt1 = $pdo->prepare("SELECT * FROM reservation WHERE id = :id");
$stmt1->execute(['id' => $id]);
$row = $stmt1->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    echo "Error: Invalid reservation ID";
    exit();
}

$stmt2 = $pdo1->prepare("SELECT * FROM reservation.confirmationwin WHERE id_resw = :id_resw");
$stmt2->execute(['id_resw' => $id]);
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

if ($row2) {
     echo "<script>alert('Already confirmed!');</script>";
      echo "<script>window.location.replace('mail.php?id=" . $id . "');</script>";
    exit();
}



$data = array(
    'mailw' =>$row['email'],
    'senderw' => 'Distunis',
    'subjectw' => 'YOU WIN A CAPONE',
    'messagew' => 'fOR YOUR LOYALTY HERES THE CODE FOR YOU SOLDE',
    'codew' => '3241987',
    'id_resw'=>$id,
);

$stmt = $pdo2->prepare("INSERT INTO reservation.confirmationwin (mailw, senderw, subjectw, messagew, codew, id_resw) VALUES (:mailw, :senderw, :subjectw, :messagew, :codew, :id_resw)");

$stmt->bindParam(':mailw', $data['mailw']);
$stmt->bindParam(':senderw', $data['senderw']);
$stmt->bindParam(':subjectw', $data['subjectw']);
$stmt->bindParam(':messagew', $data['messagew']);
$stmt->bindParam(':codew', $data['codew']);
$stmt->bindParam(':id_resw', $data['id_resw']);

if ($stmt->execute()) {
    
    echo "<script>alert('Confirmation successful!');</script>";
echo "<script>window.location.replace('mail.php?id=" . $id . "');</script>";
    exit();
} else {
    echo "Error inserting data: " . $stmt->errorInfo()[2];
}
?>
