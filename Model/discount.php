<?php
	class discount
	{
		private $id_discount;
        private $nv_prix;
        private $id_paiement ;
        
		
		
		public function __construct(float $nv_prix){
            $this->nv_prix = $nv_prix;
            

        }
        public function getid_discount () {
            return $this->id_discount;
        }

        public function setid_discount(string $id_discount){
            $this->id_discount = $id_discount;
        } 

        public function getnv_prix () {
            return $this->nv_prix;
        }

        public function setnv_prix (string $nv_prix){
            $this->nv_prix = $nv_prix;
        } 

        public function getid_paiement () {
            return $this->id_paiement;
        }

        public function setid_paiement ($id_paiement){
            $this->id_paiement = $id_paiement;
        }

       
    }

?>
