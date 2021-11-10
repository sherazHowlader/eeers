<?php 
    class storeModel extends MainModel{

        public function __construct(){
            parent:: __construct();
        }

         public function read($table, $company_name){
            $sql = "SELECT * FROM $table 
                    WHERE company_name='$company_name'
                    GROUP by pr_name order by pr_name";           
            
            return $this->select($sql);
        }

        // public function readValue($table, $company_name){
        //     $sql = "SELECT *,sum(st_quantity) as sumStore,sum(st_value) as sumValue  FROM $table 
        //             WHERE company_name='$company_name'  AND st_value <> 0
        //             GROUP by pr_name order by pr_name";           
            
        //     return $this->select($sql);
        // }


        public function readAll($table, $company_name){
            $sql = "SELECT SUM(st_value) as sumStoreValue,SUM(sl_value) as sumSellValue,SUM(dm_value) as sumDamValue
                    FROM $table                    
                    WHERE company_name='$company_name'";
                    
            return $this->select($sql);
        }

        public function readById($table, $company_name, $name){
            $sql = "SELECT *
                    FROM $table                    
                    WHERE company_name='$company_name' AND pr_name='$name' || id = '$name'
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

        public function upData($table, $data, $company_name, $id){

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