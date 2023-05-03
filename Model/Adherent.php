<?php
	class paiement
	{
		private $Id_Paie ;
        private $BankName;
        private $BranchName;
        private $Email;
        private $AccountName;
        private $AccountNumber;
        private $Date;
        private $Prix ;
		
		
		
		public function __construct(string $BankName, string $BranchName,string $Email,string $AccountName,int $AccountNumber, string $Date,int $Prix){
            $this->BankName = $BankName;
            $this->BranchName = $BranchName;
            $this->Email = $Email;
            $this->AccountName = $AccountName;
            $this->AccountNumber = $AccountNumber;
            $this->Date = $Date;
            $this->Prix = $Prix;

        }
        public function getId_Paie () {
            return $this->Id_Paie;
        }

        public function setId_Paie(string $Id_Paie){
            $this->Id_Paie = $Id_Paie;
        } 

        public function getBankName () {
            return $this->BankName;
        }

        public function setBankName (string $BankName){
            $this->BankName = $BankName;
        } 

        public function getBranchName () {
            return $this->BranchName;
        }

        public function setBranchName ($BranchName){
            $this->BranchName = $BranchName;
        }

        public function getEmail () {
            return $this->Email;
        }

        public function setEmail ($Email){
            $this->Email = $Email;
        }

        public function getAccountName () {
            return $this->AccountName;
        }

        public function setAccountName  ($AccountName){
            $this->AccountName = $AccountName;
        }

        public function getAccountNumber () {
            return $this->AccountNumber;
        }

        public function setAccountNumber  ($AccountNumber){
            $this->AccountNumber = $AccountNumber;
        }
        
        public function getDate () {
            return $this->Date;
        }

        public function setDate  ($Date){
            $this->Date = $Date;
        }
        public function getPrix () {
            return $this->Prix;
        }

        public function setPrix(float $Prix){
            $this->Prix = $Prix;
        } 
    }

?>
