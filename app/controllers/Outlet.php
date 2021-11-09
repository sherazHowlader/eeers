<?php 

    class Outlet extends MainController{  
              
        private $tableOne = 'outlet_info';
        private $tableTwo = 'market_area';

        public function __construct() {
            parent::__construct();
        }

        public function view(){
            $this->read();
        }

        public function read(){
            session_start();            
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');           
            $this->load->view('admin/content_title');

            $modelOne = $this->load->model("areaModel");
            $modelTwo = $this->load->model("outletModel");

            $rcvData['areaList'] = $modelOne->read($this->tableTwo, $company_name);
            $rcvData['outletList'] = $modelTwo->read($this->tableOne, $company_name);

            $this->load->view('outlet',$rcvData);
            $this->load->view('admin/footer');
        }

        public function create(){
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];
            
            $outlet_name  = $_REQUEST['outlet_name']." - "."(".$_REQUEST['area_name'].")";
            $owner_name   = $_REQUEST['owner_name'];
            $phn_one   = $_REQUEST['phn_one'];
            $phn_two   = $_REQUEST['phn_two'];
            $address      = $_REQUEST['address'];            

            $Data = array(
                'company_name'  => $company_name, 
                'outlet_name'   => $outlet_name, 
                'owner_name'    => $owner_name, 
                'phn_one'       => $phn_one,
                'phn_two'       => $phn_two,
                'address'       => $address
            );

            $modelOne = $this->load->model("outletModel");
            $rcvData = $modelOne->create($this->tableOne, $Data);
            header("Location: ".BASE_URL."/Outlet/view");
        }

        public function update($id=null){
            session_start();
            $user = $_SESSION['userData']; 
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');           
            $this->load->view('admin/content_title');

            $modelOne = $this->load->model("outletModel");
            $rcvData['outletUp'] = $modelOne->readById($this->tableOne,$company_name,$id);
            $rcvData['outletList'] = $modelOne->read($this->tableOne, $company_name);

            $this->load->view('outlet',$rcvData);
            $this->load->view('admin/footer');
        }

        public function upData($id=null){
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $owner_name    = $_REQUEST['owner_name'];
            $address       = $_REQUEST['address'];
            $phn_one       = $_REQUEST['phn_one'];  
            $phn_two       = $_REQUEST['phn_two'];  

            $data = array(                
                'owner_name'=> $owner_name,                
                'address'   => $address,
                'phn_one'   => $phn_one,
                'phn_two'   => $phn_two
            );

            $modelOne   = $this->load->model("outletModel");
            $rcvData    = $modelOne->upData($this->tableOne, $data, $company_name, $id);
            header("Location: ".BASE_URL."/Outlet/view");
        }

        public function remove($id=null){             
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $modelOne   = $this->load->model("outletModel");
            $rcvData    = $modelOne->remove($this->tableOne,$company_name,$id);
            header("Location: ".BASE_URL."/Outlet/view");
        }

    }

?>