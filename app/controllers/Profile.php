<?php 

    class Profile extends MainController{        
        
        private $tableOne = 'users';        

        public function __construct() {
            parent::__construct();
        }

        public function home(){
            $this->read();
        }

        public function read(){
            session_start();
            $user = $_SESSION['userData']; 
            $id = $user['id'];
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');            
            
            $modelOne   = $this->load->model("profileModel");
            
            $rcvData['profilePic']      = $modelOne->readById($this->tableOne, $company_name, $id);
            

            $this->load->view('profile',$rcvData);
            $this->load->view('admin/footer');
        }

        public function upData(){
            session_start();
            $user = $_SESSION['userData'];
            $id = $user['id'];
            $company_name = $user['company_name'];

            $currentPic = $_REQUEST['imgName'];

            $getPic         = $_FILES['profile_pic'];
            $tmp_name       = $getPic['tmp_name']; 

            $name = uniqid().".jpg";          

            $_SESSION['profileImage'] = $name;
           
            $path = 'images/profile';

            unlink("$path/$currentPic");
            move_uploaded_file ($tmp_name, "$path/$name");

            $modelOne   = $this->load->model("profileModel");
            $rcvData    = $modelOne->upData($this->tableOne,$company_name,$name,$id);
            header("Location: ".BASE_URL."/Profile/home");
        }

    }

?>