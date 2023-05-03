<?php 
class Client{
		private $id;
		private $nom;
        private $email;
		private $tel;
		private $name_account;
		private $event;


		public function __construct($nom,$email,$tel,$name_account,$event){
        $this->nom=$nom;
       
        $this->email=$email;
      
        $this->tel=$tel;
		$this->name_account=$name_account;
        $this->event=$event;
       
		}
		public function getid(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		
		public function getEmail(){
			return $this->email;
        }
       
        public function getTel(){
			return $this->tel;
        }
        public function getAccount(){
			return $this->name_account;
        }
		public function getEvent(){
			return $this->event;
        }
        
        

		public function setid($id){
			$this->id=$id;
		}
		public function setNom($nom){
			$this->nom=$nom;
		}
		
        public function setEmail($email){
			$this->email=$email;
        }
       
  		public function setTel($tel){
			$this->tel=$tel;
        }
        public function setAccount($name_account){
			$this->name_account=$name_account;
        }
       
        public function setEvent($event){
			$this->event=$event;
        }
}

?>