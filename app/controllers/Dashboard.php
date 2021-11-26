<?php 

    class Dashboard extends MainController{ 
        
        public function __construct() {
            parent::__construct();
        }

        public function home(){
            session_start();
            $user       = $_SESSION['userData']; 
            $mess_name  = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');            
            
            $this->load->view('dashboard');
            $this->load->view('admin/footer');
        } 





































    }

?>