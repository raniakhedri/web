<?php 
include "../config.php";
class PubC{

public function afficherPub()
{
    $sql="SELECT * From pubs";
    $db=config::getConnexion();
    try
      {
       $liste=$db->query($sql);
        return $liste;
      }
    catch(Exception $e)
      {
        die('Erreur:' .$e->getMessage());
      }
}


  /*      
function recupererClient($id)
{
    $sql="SELECT * from pubs where id=:id";
    $db = config::getConnexion();
    try
       {
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $req->execute();
        $res=$req->fetchAll();
        return $res;
       }
    catch (Exception $e)
       {
           die('Erreur: '.$e->getMessage());
       }
    }
*/

public function ajouterPub($pub)
{
    $sql="insert into pubs (nom,email,nomut,type,datep) values(:nom,:email,:nomut,:type,:datep)";
    $db=config::getConnexion();
    try
      {
       $req=$db->prepare($sql);
       $nom=$pub->getNom();
       
       $email=$pub->getEmail();
       
       $nomut=$pub->getNomut();
       $type=$pub->getType();
       $datep=$pub->getDatep();
       
       $req->bindValue(':nom',$nom);
       
       $req->bindValue(':email',$email);
       
       $req->bindValue(':nomut',$nomut);
       $req->bindValue(':type',$type);
       $req->bindValue(':datep',$datep);
       $req->execute();
       }
    catch(Exception $e)
      {
        die('Erreur:' .$e->getMessage());
      }
    
}
        
//chya3mel update lil immage ama fil asel yajouti fil path



public function supprimerPub($id)
{
    $sql="DELETE FROM pubs where id=:id";
    $db=config::getConnexion();
    try
      {
      $req=$db->prepare($sql);
      $req->bindValue(':id',$id);
      $req->execute();
      }
    catch(Exception $e)
      {
        die('Erreur:' .$e->getMessage());
      } 
}

function modifierPubA($pub,$id){
        $sql="UPDATE pubs SET nom=:nom,email=:email,nomut=:nomut,type=:type,datep=:datep WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{        
        $req=$db->prepare($sql);
       $nom=$pub->getNom();
       
       $email=$pub->getEmail();
       
       $nomut=$pub->getNomut();
       $type=$pub->getType();
       $datep=$pub->getDatep();
       
       $req->bindValue(':nom',$nom);
       
       $req->bindValue(':email',$email);
       
       $req->bindValue(':nomut',$nomut);
       $req->bindValue(':type',$type);
       $req->bindValue(':datep',$datep);
       $req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
        function modifierPub($pub,$id){
        $sql="UPDATE pubs SET nom=:nom,email=:email,nomut=:nomut,type=:type,datep=:datep WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
       $req=$db->prepare($sql);
       $nom=$pub->getNom();
       
       $email=$pub->getEmail();
       
       $nomut=$pub->getNomut();
       $type=$pub->getType();
       $datep=$pub->getDatep();
       
       
                  




        $datas = array(':id'=>$id, ':nom'=>$nom, ':prenom'=>$prenom, ':email'=>$email,':nomut'=>$nomut);
        $req->bindValue(':nom',$nom);
       
       $req->bindValue(':email',$email);
       
       $req->bindValue(':nomut',$nomut);
       $req->bindValue(':type',$type);
       $req->bindValue(':datep',$datep);
       $req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
  die;
        }
        
    }
}
?>