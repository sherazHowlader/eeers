<?php 
    class accountModel extends MainModel{

        public function __construct(){
            parent:: __construct();
        }

         public function read($tableOne, $company_name){
            $sql = "SELECT *,sum(st_quantity) as sumStore,sum(sl_quantity) as sumSell,sum(dm_quantity) as sumDam,sum(st_value) as sumStoreValue,sum(sl_value) as sumSellValue,sum(dm_value) as sumDamValue
                    FROM $tableOne                     
                    WHERE company_name='$company_name' 
                    GROUP BY pr_name                    
                ";
            
            return $this->select($sql);
        }


        public function remove($table, $company_name){
            $sql = "DELETE FROM $table 
                    WHERE company_name='$company_name'";                   

            return $this->delete($sql);
        }



        




























    }
?>