<?php 
class Pub{
		private $id;
		private $nom;
        private $email;
		private $nomut;
		private $type;
		private $datep;


		public function __construct($nom,$email,$nomut,$type,$datep){
        $this->nom=$nom;
       
        $this->email=$email;
      
        $this->nomut=$nomut;
		$this->type=$type;
        $this->datep=$datep;
       
		}
		public function getId(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		
		public function getEmail(){
			return $this->email;
        }
       
        public function getNomut(){
			return $this->nomut;
        }
        public function getType(){
			return $this->type;
        }
		public function getDatep(){
			return $this->datep;
        }
        
        

		public function setId($id){
			$this->id=$id;
		}
		public function setNom($nom){
			$this->nom=$nom;
		}
		
        public function setEmail($email){
			$this->email=$email;
        }
       
  		public function setNomut($nomut){
			$this->nomut=$nomut;
        }
        public function setType($type){
			$this->type=$type;
        }
       
        public function setDatep($datep){
			$this->datep=$datep;
        }
}

?>