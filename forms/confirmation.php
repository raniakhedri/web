<?php
require 'bd.php';
require 'bd1.php';
$id = $_GET['id'];
$stmt1 = $pdo->prepare("SELECT * FROM reservation WHERE id = :id");
$stmt1->execute(['id' => $id]);
$row = $stmt1->fetch(PDO::FETCH_ASSOC);

if (!$row) {
    echo "Error: Invalid reservation ID";
    exit();
}

$stmt2 = $pdo1->prepare("SELECT * FROM reservation.confirmation WHERE id_res = :id_res");
$stmt2->execute(['id_res' => $id]);
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

if ($row2) {
     echo "<script>alert('Already confirmed!');</script>";
      echo "<script>window.location.replace('mail.php?id=" . $id . "');</script>";
    exit();
}

$data = array(
    'mail' =>$row['email'],
    'sender' => 'Distunis',
    'subject' => 'Your reservation has been confirmed',
    'message' => 'Thank you for your reservation.',
    'code' => '6969',
    'id_res'=>$id,
);

$stmt = $pdo1->prepare("INSERT INTO reservation.confirmation (mail, sender, subject, message, code, id_res) VALUES (:mail, :sender, :subject, :message, :code, :id_res)");

$stmt->bindParam(':mail', $data['mail']);
$stmt->bindParam(':sender', $data['sender']);
$stmt->bindParam(':subject', $data['subject']);
$stmt->bindParam(':message', $data['message']);
$stmt->bindParam(':code', $data['code']);
$stmt->bindParam(':id_res', $data['id_res']);

if ($stmt->execute()) {
    
    echo "<script>alert('Confirmation successful!');</script>";
     echo "<script>window.location.replace('tables.php');</script>";
    exit();
} else {
    echo "Error inserting data: " . $stmt->errorInfo()[2];
}
?>
