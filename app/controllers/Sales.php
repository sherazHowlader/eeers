<?php 

    class Sales extends MainController{        
        
        private $tableOne   = 'pr_management';
        private $tableTwo   = 'outlet_info';
        private $tableThee  = 'store';

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
            
            $modelOne   = $this->load->model("outletModel");            
            $modelTwo   = $this->load->model("storeModel");
            $modelThree = $this->load->model("saleModel");
            
            $rcvData['sellInfo']    = $modelThree->read($this->tableOne, $company_name);
            $rcvData['outlet_info'] = $modelOne->read($this->tableTwo, $company_name);
            $rcvData['product_list']= $modelTwo->read($this->tableOne, $company_name);

            $this->load->view('sales', $rcvData);
            $this->load->view('admin/footer');
        }

        public function create(){
            session_start();
            $user = $_SESSION['userData'];
            $company_name  = $user['company_name'];

            $outlet_name    = $_REQUEST['outlet_name'];
            $product_name   = $_REQUEST['pr_name'];
            $price          = $_REQUEST['price'];
            $quantity       = $_REQUEST['quantity'];
            $total_value    = $_REQUEST['price'] * $_REQUEST['quantity'];
            $deposit_date   = $_REQUEST['deposit_date'];     

            $Data = array(
                'company_name'  => $company_name,
                'outlet_name'   => $outlet_name, 
                'pr_name'       => $product_name, 
                'sl_price'      => $price, 
                'sl_quantity'   => $quantity,
                'sl_value'      => $total_value,
                'deposit_date'  => $deposit_date                
            );

            $modelOne = $this->load->model("saleModel");
            $rcvData = $modelOne->create($this->tableOne, $Data);            

            header("Location: ".BASE_URL."/Sales/home");
        }

        public function update($id=null){
            session_start();
            $user = $_SESSION['userData']; 
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');           
            $this->load->view('admin/content_title');

            $modelOne = $this->load->model("saleModel");
            $rcvData['voucherInfo'] = $modelOne->readById($this->tableOne,$company_name,$id);

            $this->load->view('storeDamageEdit',$rcvData);
            $this->load->view('admin/footer');
        }

        // public function upData($id=null){
        //     session_start();
        //     $user = $_SESSION['userData'];
        //     $company_name = $user['company_name'];

        //     $product_name   = $_REQUEST['product_name'];
        //     $price          = $_REQUEST['price'];
        //     $quantity       = $_REQUEST['quantity'];  

        //     $modelOne   = $this->load->model("saleModel");
        //     $rcvData    = $modelOne->upData($this->tableOne,$company_name,$product_name,$price,$quantity,$id);
        //     // header("Location: ".BASE_URL."/Sales/home");
        // }

        public function upData($id=null){
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];            

            $price          = $_REQUEST['price'];
            $quantity       = $_REQUEST['quantity'];  
            $total_value    = $_REQUEST['price'] * $_REQUEST['quantity'];

            $Data = array(                
                'sl_price'    => $price,                
                'sl_quantity' => $quantity,
                'sl_value'    => $total_value
            );

            $modelOne   = $this->load->model("saleModel");
            $rcvData    = $modelOne->upData($this->tableOne,$Data,$id,$company_name);
            header("Location: ".BASE_URL."/Sales/home");
        }

        public function remove($id=null){             
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $modelOne   = $this->load->model("saleModel");
            $rcvData    = $modelOne->remove($this->tableOne,$company_name,$id);
            header("Location: ".BASE_URL."/Sales/home");
        }

        public function details($name=NULL){
            session_start();
            $user = $_SESSION['userData']; 
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');
            $this->load->view('admin/content_title');

            $modelOne = $this->load->model("outletModel");           

            $rcvData['outlet_info']  = $modelOne->readById($this->tableTwo,$company_name,$name);
            $rcvData['sellInfo']     = $modelOne->readById($this->tableOne,$company_name,$name);            

            $this->load->view('saleDetails',$rcvData);
            $this->load->view('admin/footer');
        }
    }

?>