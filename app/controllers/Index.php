<?php 

    class Index extends MainController{

        private $usersTable = 'users';
        private $roleTable  = 'role';

        public function __construct() {
            parent::__construct();
        }

        public function home(){
            $this->login();
        }

        public function signUp(){
            $this->load->view('login/register');
        }

        public function userInfo(){
           session_start();            
            if (isset($_SESSION['userData'])) {
                header("Location: ".BASE_URL."/Dashboard/home");
            }
            
           $name    = $_REQUEST['name'];
           $email   = $_REQUEST['email'];
           $pass    = $_REQUEST['pass'];

           $this->load->view('login/companyInfo');
        }

        public function createUser(){
            $name   = $_REQUEST['name'];
            $email  = $_REQUEST['email'];
            $pass   = $_REQUEST['pass'];

            $company_name   = $_REQUEST['company_name'];
            $phn            = $_REQUEST['phn'];

            $Data = array(
                'name'          => $name,
                'email'         => $email,
                'pass'          => $pass,
                'company_name'  => $company_name,
                'phn'           => $phn
            );

            $modelOne   = $this->load->model("usersModel");
            $rcvData    = $modelOne->userInsert($this->usersTable, $Data);

            header("Location: ".BASE_URL."/Index/login");
         }

         public function login(){
            session_start();            
            if (isset($_SESSION['userData'])) {
                header("Location: ".BASE_URL."/Dashboard/home");
            }
            $this->load->view('login/logIn');
         }

         public function loginAuth(){
            $email  = $_REQUEST['email'];
            $pass   = $_REQUEST['pass'];

            $modelOne   = $this->load->model("usersModel");
            $rcvData    = $modelOne->checkUser($this->usersTable, $email, $pass);

            if ($rcvData > 0) {
                $rcvData = $modelOne->getUser($this->usersTable, $this->roleTable, $email, $pass);
                session_start();
                $_SESSION['userData'] = $rcvData[0];
                header("Location: ".BASE_URL."/Dashboard/home");
            }else{
                header("Location: ".BASE_URL."/Index/signup?msg=user not found");
            }
         }

         public function users(){
            session_start();
            $user = $_SESSION['userData'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/content_title');

            $role_id = '3';
            $company_name = $user['company_name'];

            $modelOne = $this->load->model("usersModel");
            $rcvData['usersList'] = $modelOne->userList($this->usersTable, $company_name, $role_id);

            $this->load->view('users', $rcvData);
            $this->load->view('admin/footer');
         }

         public function userCR(){
            $name   = $_REQUEST['name'];
            $email  = $_REQUEST['email'];
            $pass   = $_REQUEST['pass'];
            $company_name = $_REQUEST['company_name'];
            $phn    = $_REQUEST['phn'];

            $Data = array(
                'name'      => $name,
                'email'     => $email,
                'pass'      => $pass,
                'company_name' => $company_name,
                'phn'       => $phn,
                'role_id'   => '3'            
            );            

            $modelOne   = $this->load->model("usersModel");
            $rcvData    = $modelOne->userInsert($this->usersTable, $Data);           
            header("Location: ".BASE_URL."/Index/users");
         }

         public function edit($name=NULL){
            session_start();           

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/content_title');

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $modelOne = $this->load->model("usersModel");

            $rcvData['userInfo'] = $modelOne->selectUserById($this->usersTable, $name, $company_name);           

            $this->load->view('userInfoEdit',$rcvData);
            $this->load->view('admin/footer');
         }         
         
         public function update($oldName=NULL){
            session_start();

            $name    = $_REQUEST['name'];
            $email   = $_REQUEST['email'];            
            $pass    = $_REQUEST['pass'];            
           
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];
        

            $modelOne = $this->load->model("usersModel");            
            $rcvData['userInfo'] = $modelOne->updateUser($this->usersTable,$name,$email,$pass,$company_name,$oldName);

            header("Location: ".BASE_URL."/Index/users"); 
         }

         public function delete($id=NULL){
            session_start();

            $modelOne = $this->load->model("usersModel");
            $rcvData['userInfo'] = $modelOne->deleteUser($this->usersTable, $id);
            header("Location: ".BASE_URL."/Index/users");
         }

         public function logOut(){
            session_start();
            session_destroy();
            header("Location: ".BASE_URL."/Index/login");
         }

    }
?>