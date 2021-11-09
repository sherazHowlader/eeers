<?php 

    class Account extends MainController{        
        
        private $tableOne = 'pr_management';
        private $tableTwo = 'sales_voucher';

        public function __construct() {
            parent::__construct();
        }

        public function home(){
            $this->read();
        }

        public function read(){
            session_start();
            $user = $_SESSION['userData']; 
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');           
            $this->load->view('admin/content_title');           
            
            $modelOne   = $this->load->model("accountModel");
            
            $rcvData['prList']      = $modelOne->read($this->tableOne, $company_name);             

            $this->load->view('finalAccount',$rcvData);
            $this->load->view('admin/footer');
        }


        public function setting(){
            session_start();
            $user = $_SESSION['userData']; 
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');           
            $this->load->view('admin/content_title');           
            
            $modelOne   = $this->load->model("accountModel");
            
            $rcvData['prList']      = $modelOne->read($this->tableOne, $company_name);             

            $this->load->view('settings');
            $this->load->view('admin/footer');
        }

        public function reset(){
            session_start();

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];           

            $modelOne = $this->load->model("accountModel");
            $rcvData = $modelOne->remove($this->tableOne, $company_name);

            header("Location: ".BASE_URL."/Store/home");
        }


    }

?>