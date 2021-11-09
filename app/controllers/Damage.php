<?php 

    class Damage extends MainController{        
        
        private $tableOne = 'pr_management';
        private $tableTwo = 'product_list';

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
            
            $modelOne     = $this->load->model("damageModel");
            
            $rcvData['prList']      = $modelOne->readValue($this->tableOne, $company_name);
            $rcvData['productList'] = $modelOne->read($this->tableTwo, $company_name);
            $rcvData['totalPr'] = $modelOne->readAll($this->tableOne, $company_name);
            
            $this->load->view('damage', $rcvData);
            $this->load->view('admin/footer');
        }

        public function create(){
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $product_name   = $_REQUEST['pr_name'];
            $price          = $_REQUEST['price'];
            $quantity       = $_REQUEST['quantity'];
            $total_value    = $_REQUEST['price'] * $_REQUEST['quantity'];
            $deposit_date   = $_REQUEST['deposit_date'];           
            

            $Data = array(
                'company_name'  => $company_name,
                'pr_name'       => $product_name, 
                'dm_price'      => $price, 
                'dm_quantity'   => $quantity,
                'dm_value'      => $total_value,
                'deposit_date'  => $deposit_date 
            );

            $modelOne   = $this->load->model("damageModel");
            $rcvData    = $modelOne->create($this->tableOne, $Data);
            header("Location: ".BASE_URL."/Damage/home");
        }

        public function update($id=null){
            session_start();
            $user = $_SESSION['userData']; 
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');           
            $this->load->view('admin/content_title');

            $modelOne = $this->load->model("damageModel");
            $rcvData['damageProduct'] = $modelOne->readById($this->tableOne,$company_name,$id);

            $this->load->view('storeDamageEdit',$rcvData);
            $this->load->view('admin/footer');
        }

        public function upData($id=null){
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $product_name   = $_REQUEST['pr_name'];
            $price          = $_REQUEST['price'];
            $quantity       = $_REQUEST['quantity'];
            $total_value    = $_REQUEST['price'] * $_REQUEST['quantity'];

            $data = array(                
                'pr_name'       => $product_name,
                'dm_price'      => $price,
                'dm_quantity'   => $quantity,
                'dm_value'      => $total_value
            );

            $modelOne   = $this->load->model("damageModel");
            $rcvData    = $modelOne->upData($this->tableOne, $data, $company_name, $id);
            header("Location: ".BASE_URL."/Damage/home");
        }

        public function remove($id=null){             
            session_start();
            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $modelOne   = $this->load->model("damageModel");
            $rcvData    = $modelOne->remove($this->tableOne,$company_name,$id);
            header("Location: ".BASE_URL."/Damage/home");
        }

        public function details($name=null){
            session_start();
            $user = $_SESSION['userData']; 
            $company_name = $user['company_name'];

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');           
            $this->load->view('admin/content_title');           
            
            $modelOne = $this->load->model("damageModel");
            $rcvData['prDetails'] = $modelOne->readById($this->tableOne,$company_name,$name);
            
            $this->load->view('damageDetails',$rcvData);
            $this->load->view('admin/footer');
        }

    }

?>