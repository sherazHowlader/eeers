<?php 
    class storeModel extends MainModel{

        public function __construct(){
            parent:: __construct();
        }

         public function read($table, $company_name){
            $sql = "SELECT * FROM $table 
                    WHERE company_name='$company_name'                    
                    GROUP by product_name order by product_name";           
            
            return $this->select($sql);
        }

        public function readById($table, $company_name, $name){
            $sql = "SELECT *
                    FROM $table                    
                    WHERE company_name='$company_name' AND product_name='$name' || id = '$name'
                    ";                    
                    
            return $this->select($sql);
        }

        public function create($table, $Data){
            $key    = array_keys($Data);
            $keys   = implode(",", $key);
            $placeholder = ":" . implode(", :", $key);
            $sql = "INSERT INTO $table ($keys) VALUES ($placeholder)";
            
            return $this->insert($sql,$Data);
        }

        public function upData($table, $company_name,$product_name,$price,$quantity,$id){

            $sql = "UPDATE $table 
                    SET product_name='$product_name',price='$price',store_quantity='$quantity'
                    WHERE id='$id' AND company_name='$company_name' ";                
                
            return $this->update($sql);
        }

        public function remove($table, $company_name,$id){
            $sql = "DELETE FROM $table 
                    WHERE company_name='$company_name' AND id='$id' ";

            return $this->delete($sql);
        }
        




























    }
?>