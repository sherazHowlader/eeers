<?php 
    class areaModel extends MainModel{

        public function __construct(){
            parent:: __construct();
        }

        public function create($table, $Data){
            $key    = array_keys($Data);
            $keys   = implode(",", $key);
            $placeholder = ":" . implode(", :", $key);
            $sql = "INSERT INTO $table ($keys) VALUES ($placeholder)";
            
            return $this->insert($sql,$Data);
        }

        public function read($table, $company_name){
            $sql = "SELECT * FROM $table 
                    WHERE company_name='$company_name'
                    order by area_name";   
            
            return $this->select($sql);
        }

        public function readById($table, $company_name,$id){            
            $sql = "SELECT * FROM $table
                    WHERE company_name='$company_name' AND id='$id'";            

            return $this->select($sql);
        }

        public function upData($product_list, $company_name,$area_name,$id){

            $sql = "UPDATE $product_list 
                    SET area_name='$area_name'
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