<?php 
    class saleModel extends MainModel{

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
            $sql = "SELECT * , SUM(sl_value) as total_value
                    FROM $table                    
                    WHERE company_name='$company_name' AND sl_value <> 0
                    Group by outlet_name";
                    
            return $this->select($sql);
        }         

        public function readById($table, $company_name, $name){
            $sql = "SELECT *
                    FROM $table                    
                    WHERE company_name='$company_name' AND pr_name='$name' || id = '$name'
                    ";                    
                  
            return $this->select($sql);
        }

        // public function upData($table, $company_name,$product_name,$price,$quantity,$id){

        //     $sql = "UPDATE $table 
        //             SET product_name='$product_name',price='$price',sell_quantity='$quantity'
        //             WHERE id='$id' AND company_name='$company_name' ";                
                
        //     return $this->update($sql);
        // }


        public function upData($table,$Data,$id,$company_name){
           $updateKeys = NULL ;

            foreach ($Data as $key => $value) {
                $updateKeys .= "$key=$value,";
            }
            
            $updateKeys = rtrim($updateKeys, ",");
            
            $sql = "UPDATE $table 
                    SET $updateKeys
                    WHERE id='$id' AND company_name='$company_name'";            

            return $this->upArrayData($sql,$Data);
        }


        public function remove($table, $company_name,$id){
            $sql = "DELETE FROM $table 
                    WHERE company_name='$company_name' AND id='$id' ";

            return $this->delete($sql);
        }






































    }
?>