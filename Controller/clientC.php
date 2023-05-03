<?php 
include "../config.php";
class ClientC{

public function afficherClients()
{
    $sql="SELECT * From reservation";
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
public function afficherClientsbyid($id)
{
    $sql="SELECT * FROM reservation WHERE id=:id";
    $db=config::getConnexion();
    try {
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $liste = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $liste;
    } catch(PDOException $e) {
        die('Erreur:' . $e->getMessage());
    }
}



        
function recupererClient($id)
{
  if($id==null){
    $sql="SELECT * From reservation";
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
  else{
    $sql="SELECT * from reservation where id=:id";
    $db = config::getConnexion();
    try
       {
        $req=$db->prepare($sql);
        $req->bindValue(':id',$id);
        $req->execute();
        $req=$req->fetchAll();
        return $req;
       }
    catch (Exception $e)
       {
           die('Erreur: '.$e->getMessage());
       }
       }
    }


public function ajouterclients($client)
{
    $sql="insert into reservation (nom,email,tel,name_account,event) values(:nom,:email,:tel,:name_account,:event)";
    $db=config::getConnexion();
    try
      {
       $req=$db->prepare($sql);
       $nom=$client->getNom();
       
       $email=$client->getEmail();
       
       $tel=$client->getTel();
       $name_account=$client->getAccount();
       $event=$client->getEvent();
       
       $req->bindValue(':nom',$nom);
       
       $req->bindValue(':email',$email);
       
       $req->bindValue(':tel',$tel);
       $req->bindValue(':name_account',$name_account);
       $req->bindValue(':event',$event);
       $req->execute();
       }
    catch(Exception $e)
      {
        die('Erreur:' .$e->getMessage());
      }
    
}
        
//chya3mel update lil immage ama fil asel yajouti fil path



public function supprimerClient($id)
{
    $sql="DELETE FROM reservation where id=:id";
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

function modifierClientPwd($client,$id){
        $sql="UPDATE reservation SET nom=:nom,email=:email,tel=:tel,name_account=:name_account,event=:event WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        try{        
        $req=$db->prepare($sql);
       $nom=$client->getNom();
       
       $email=$client->getEmail();
       
       $tel=$client->getTel();
       $name_account=$client->getAccount();
       $event=$client->getEvent();
       
       $req->bindValue(':nom',$nom);
       
       $req->bindValue(':email',$email);
       
       $req->bindValue(':tel',$tel);
       $req->bindValue(':name_account',$name_account);
       $req->bindValue(':event',$event);
       $req->execute();
            
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
        function modifierClient($client,$id){
        $sql="UPDATE reservation SET nom=:nom,email=:email,tel=:tel,name_account=:name_account,event=:event WHERE id=:id";
        
        $db = config::getConnexion();
        //$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{        
       $req=$db->prepare($sql);
       $nom=$client->getNom();
       
       $email=$client->getEmail();
       
       $tel=$client->getTel();
       $name_account=$client->getAccount();
       $event=$client->getEvent();
       
       
                  




        $datas = array(':id'=>$id, ':nom'=>$nom, ':prenom'=>$prenom, ':email'=>$email,':tel'=>$tel);
        $req->bindValue(':nom',$nom);
       
       $req->bindValue(':email',$email);
       
       $req->bindValue(':tel',$tel);
       $req->bindValue(':name_account',$name_account);
       $req->bindValue(':event',$event);
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