<?php
	include '../config.php';
	include_once '../Model/Adherent.php';
	class AdherentC {
		function afficheradherents(){
			$sql="SELECT * FROM reclamation";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
	
	
		
		function supprimeradherent($id){
			$sql="DELETE FROM reclamation WHERE id=:id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id', $id);
			try{
				$req->execute();
			}
			catch(Exception $e){
				die('Erreur:'. $e->getMessage());
			}
		}
		function ajouteradherent($reclamation){
			$sql="INSERT INTO reclamation (id, nom, description, email) 
			VALUES (:id,:nom,:description, :email)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'id' => $reclamation->getid(),
					'nom' => $reclamation->getnom(),
					'description' => $reclamation->getdescription(),
					'email' => $reclamation->getemail(),
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function recupereradherent($id){
			$sql="SELECT * from reclamation where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$reclamation=$query->fetch();
				return $reclamation;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		
		function modifieradherent($reclamation){
			$config = config::getConnexion();
            try {
                $querry = $config->prepare('
                UPDATE reclamation SET
                nom=:nom ,
				description=:description ,
				email=:email 
                where id=:id
                ');
                $querry->execute([
                    'id'=>$reclamation->getid(),
                    'nom'=>$reclamation->getnom(),
					'description'=>$reclamation->getdescription(),
					'email'=>$reclamation->getemail(),
                ]);
            } catch (PDOException $th) {
                 $th->getMessage();
            }
		}

	}
?>