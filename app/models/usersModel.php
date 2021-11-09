<?php 

    class usersModel extends MainModel{

        public function __construct(){
            parent:: __construct();
        }

        public function userInsert($table, $Data){
            $key    = array_keys($Data);
            $keys   = implode(",", $key);
            $placeholder = ":" . implode(", :", $key);
            $sql = "INSERT INTO $table ($keys) VALUES ($placeholder)";
            
            return $this->insert($sql,$Data);
        }

        public function userList($table, $company_name){
            $sql = "SELECT * FROM $table 
                    WHERE company_name='$company_name' ";   

            return $this->select($sql);
        }

        public function checkUser($table, $email, $pass){
            $sql = "SELECT * FROM $table WHERE email='$email' AND pass='$pass'";
            return $this->count($sql);
        }

        public function getUser($usersTable, $roleTable, $email, $pass){

            $sql = "SELECT $usersTable.*, $roleTable.role_name
                    FROM $usersTable
                    INNER JOIN $roleTable
                    ON $usersTable.role_id = $roleTable.role_id
                    WHERE $usersTable.email='$email' AND $usersTable.pass='$pass'";

            return $this->select($sql);
        }

        public function memberCount($table, $mess_name){
            $sql = "SELECT * FROM $table WHERE mess_name='$mess_name'";
            return $this->count($sql);
        }
        
        public function selectUserById($table, $name, $company_name){
            $sql = "SELECT * FROM $table WHERE name='$name' AND company_name='$company_name' ";
            return $this->select($sql);
        }        

        public function updateUser($usersTable, $name,$email,$pass,$company_name,$oldName){

            $sql = "UPDATE $usersTable 
                    SET name='$name',email='$email',pass='$pass' 
                    WHERE name='$oldName' AND company_name='$company_name' ";
                    
            return $this->update($sql);
        }

        public function deleteUser($table, $id){
            $sql = "DELETE FROM $table 
                    WHERE id=$id; ";

            return $this->delete($sql);
        }

































    }

?>