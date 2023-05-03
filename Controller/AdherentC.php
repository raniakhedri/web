<?php
	include '../../config.php';
	include_once '../../Model/Adherent.php';
	use \PHPMailer\PHPMailer\PHPMailer;
	use \PHPMailer\PHPMailer\Exception;
	use \PHPMailer\PHPMailer\SMTP;
	require_once __DIR__ . '/vendor/autoload.php';
	class AdherentC {
		function afficherPaie(){
			$sql="SELECT * FROM paiement";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}

	
		
		function supprimeradherent($Id_Paie){
			$sql = "DELETE FROM paiement WHERE Id_Paie = :Id_Paie";
				$db = config::getConnexion();
				$req = $db->prepare($sql);
				$req->bindValue(':Id_Paie', $Id_Paie);
		
				try {
					$req->execute();
				} catch (Exception $e) {
					die('Error:' . $e->getMessage());
				}
		}
		

    

		
		
		function AddUser($paiement)
{
    $db = config::getConnexion();
    try {
        // Insert the payment information into the paiement table
        $sql = "INSERT INTO paiement (BankName, BranchName, Email, AccountName, AccountNumber, Date, Prix)
                VALUES (:BankName, :BranchName, :Email, :AccountName, :AccountNumber, :Date, :Prix)";
        $query = $db->prepare($sql);
        $query->execute([
            'BankName' => $paiement->getBankName(),
            'BranchName' => $paiement->getBranchName(),
            'Email' => $paiement->getEmail(),
            'AccountName' => $paiement->getAccountName(),
            'AccountNumber' => $paiement->getAccountNumber(),
            'Date' => $paiement->getDate(),
            'Prix' => $paiement->getPrix()
        ]);
		$mail = new PHPMailer(true);

         try {
              $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $mail->isSMTP();                                            
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yosr.khriji27@gmail.com';
        //Password to use for SMTP authentication
        $mail->Password = 'nvzpneneupvvojfd';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
        $mail->Port = 587;
             $mail->setFrom('yosr.khriji27@gmail.com');
             $mail->addAddress($paiement->getEmail());
             $mail->isHTML(true);                               
             $mail->Subject = 'Confirmation de paiement reussi';
             $mail->Body = 'Nous sommes heureux de vous informer que votre paiement a été traité avec succès. Votre commande a été confirmée et sera traitée dans les plus brefs délais. ';
             $mail->send();
         } catch (Exception $e) {
             echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
         }
        $id_paiement = $db->lastInsertId(); // Get the ID of the newly added payment

        // Count the number of occurrences of the AccountNumber in the paiement table
        $sql_count = "SELECT COUNT(*) FROM paiement WHERE AccountNumber = :AccountNumber";
        $query_count = $db->prepare($sql_count);
        $query_count->execute(['AccountNumber' => $paiement->getAccountNumber()]);
        $count = $query_count->fetchColumn();

        // If the count is greater than 4, add a discount to the price and insert it into the discount table
        if ($count == 4) {
            $discount_price = $paiement->getPrix() * 0.9; // Calculate the discounted price
            $sql_discount = "INSERT INTO discount (id_paiement, nv_prix)
                             SELECT :id_paiement, :nv_prix FROM paiement WHERE AccountNumber = :AccountNumber";
            $query_discount = $db->prepare($sql_discount);
            $query_discount->execute([
                'id_paiement' => $id_paiement,
                'nv_prix' => $discount_price,
                'AccountNumber' => $paiement->getAccountNumber()
            ]);
        }
		
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

		

   
		function recupereradherent($Id_Paie){
			$sql="SELECT * from paiement where id=$Id_Paie";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$paiement=$query->fetch();
				return $paiement;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function triuserAsc()
		{
			$db = config::getConnexion();
			$sql =  "SELECT * FROM  paiement
			ORDER BY BankName ASC";
			
			try{
				return $db->query($sql);
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		
		}
		function triuserdesc()
		{
			$db = config::getConnexion();
			$sql =  "SELECT * FROM paiement
			ORDER BY BankName DESC";;
			
			try{
				return $db->query($sql);
			}
			   catch (Exception $e)
			   {
				   die('Erreur:'.$e->getMessage());
			   }
		

	}
	}
		
		

	

?>