<?php
	include '../../config2.php';

	include_once '../../Model/discount.php';
	class discountC {
		function afficherdiscounts(){
			$sql="SELECT * FROM discount";
			$db = config2::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMeesage());
			}
		}
	
		/*function afficherdiscountuser($id_paiement){
			$db = config2::getConnexion();
            $stmt = $db->prepare("SELECT * FROM discount WHERE id_paiement = :id_paiement");
            $stmt->bindValue(':id_paiement', $id_paiement);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
		}*/
	
	
		
		/*function supprimerdiscount($id_discount){
			$sql="DELETE FROM discount WHERE id_discount =:id_discount ";
			$db = config2::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_discount ', $id_discount );
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}*/

        function supprimerdiscount($id_discount){
			$sql = "DELETE FROM discount WHERE id_discount = :id_discount";
				$db = config2::getConnexion();
				$req = $db->prepare($sql);
				$req->bindValue(':id_discount', $id_discount);
		
				try {
					$req->execute();
				} catch (Exception $e) {
					die('Error:' . $e->getMessage());
				}
		}
		function ajouterdiscount($discount){
			$sql="INSERT INTO discount (id_discount ,nv_prix ,id_paiement) 
            VALUES (:id_discount,:nv_prix,:id_paiement)";
            $db = config2::getConnexion();
            try{
                $query = $db->prepare($sql);
                $query->execute([
                    'id_discount' => $discount->getid_discount(),
                    'nv_prix' => $discount->getnv_prix(),
                    'id_paiement' => $discount->getid_paiement(),


                ]);
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
		}




		function recupererdiscount($id_discount){
			$sql="SELECT * from discount where id_discount=$id_discount";
			$db = config2::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$discount=$query->fetch();
				return $discount;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		/*
		function modifierdiscount($discount){
			$config2 = config2::getConnexion();
            try {
                $querry = $config2->prepare('
                UPDATE discount SET
                texte=:texte 
                where id=:id
                ');
                $querry->execute([
                    'id'=>$discount->getid(),
                    'texte'=>$discount->gettexte(),
					
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
		}*/

	}
?>