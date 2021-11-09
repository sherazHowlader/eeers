<?php 

    class Area extends MainController{    
            
        private $tableOne = 'market_area';

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
            $rcvData['areaList'] = $modelOne->read($this->tableOne, $company_name);

            $this->load->view('area',$rcvData);
            $this->load->view('admin/footer');
        }

        public function create(){
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $area_name  = $_REQUEST['area_name'];                      
            
            $Data = array(
                'company_name'  => $company_name,
                'area_name'     => $area_name
            );

            $modelOne = $this->load->model("areaModel");
            $rcvData = $modelOne->create($this->tableOne, $Data);
            header("Location: ".BASE_URL."/Area/view");
        }

        public function update($id=null){
            session_start();

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];     

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');           
            $this->load->view('admin/content_title');

            $modelOne = $this->load->model("areaModel");
            $rcvData['areaEdit'] = $modelOne->readById($this->tableOne, $company_name,$id);
            $rcvData['areaList'] = $modelOne->read($this->tableOne, $company_name);       

            $this->load->view('area',$rcvData);
            $this->load->view('admin/footer');            
        }

        public function upData($id=null){
            session_start();

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $area_name    = $_REQUEST['area_name'];            

            $modelOne = $this->load->model("areaModel");
            $rcvData['catEdit'] = $modelOne->upData($this->tableOne, $company_name,$area_name,$id);

            header("Location: ".BASE_URL."/Area/view");            
        }

        public function remove($id=null){
            session_start();

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];            

            $modelOne = $this->load->model("areaModel");
            $rcvData = $modelOne->remove($this->tableOne, $company_name,$id);

            header("Location: ".BASE_URL."/Area/view");            
        }

    }

?>