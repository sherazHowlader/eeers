<?php 
    class outletModel extends MainModel{

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
                    order by outlet_name";                    

            return $this->select($sql);
        }

        public function readById($table, $company_name,$name){
            $sql = "SELECT * FROM $table 
                    WHERE company_name='$company_name' AND outlet_name='$name' || id = '$name'
                    ";   

            return $this->select($sql);
        }

        public function upData($table,$data, $company_name, $id){
            $updateKeys = NULL ;
 
             foreach ($data as $key => $value) {
                 $updateKeys .= "$key='$value',";
             }
             
             $updateKeys = rtrim($updateKeys, ",");
             
             $sql = "UPDATE $table 
                     SET $updateKeys
                     WHERE id='$id' AND company_name='$company_name'";            
 
             return $this->upArrayData($sql,$data);
         }

        public function remove($table, $company_name,$id){
            $sql = "DELETE FROM $table 
                    WHERE company_name='$company_name' AND id='$id' ";

            return $this->delete($sql);
        }























    }
?>