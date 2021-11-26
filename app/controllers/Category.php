<?php 

    class Category extends MainController{    
            
        private $tableOne = 'product_list';

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

            $modelOne = $this->load->model("categoryModel");
            $rcvData['catList'] = $modelOne->read($this->tableOne, $company_name);

            $this->load->view('category',$rcvData);
            $this->load->view('admin/footer');
        }

        public function create(){
            session_start();

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $product_name   = $_REQUEST['pr_name'];
            $brand_name     = $_REQUEST['brand_name'];
            $madeIn         = $_REQUEST['madeIn'];

            $getPic      = $_FILES['pro_image'];            
            $tmp_name    = $getPic['tmp_name']; 

            $name = uniqid().".jpg";
            $path = 'images/product';
            
            move_uploaded_file ($tmp_name, "$path/$name");


            $Data = array(                                 
                'company_name'  => $company_name,
                'pr_name'       => $product_name,
                'brand_name'    => $brand_name,
                'madeIn'        => $madeIn,
                'pro_image'     => $name
            );

            $modelOne = $this->load->model("categoryModel");
            $rcvData = $modelOne->create($this->tableOne, $Data);

            header("Location: ".BASE_URL."/Category/view");
        }

        public function update($id=null){
            session_start();

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];     

            $this->load->view('admin/header');
            $this->load->view('admin/sidebar');

            $modelOne = $this->load->model("categoryModel");
            $rcvData['catEdit'] = $modelOne->readById($this->tableOne, $company_name,$id);
            $rcvData['catList'] = $modelOne->read($this->tableOne, $company_name);       

            $this->load->view('category',$rcvData);
            $this->load->view('admin/footer');            
        }

        public function upData($id=null){
            session_start();

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $brand_name    = $_REQUEST['brand_name'];
            $product_name  = $_REQUEST['pr_name'];            
            $madeIn        = $_REQUEST['madeIn'];

            $currentPic = $_REQUEST['imgName'];

            $getPic         = $_FILES['pro_image'];
            $tmp_name       = $getPic['tmp_name']; 

            $name = uniqid()." - ".$product_name.".jpg";            
           
            $path = 'images/product';

            unlink("$path/$currentPic");
            move_uploaded_file ($tmp_name, "$path/$name");

            $data = array(                
                'brand_name'   => $brand_name,                
                'pr_name'      => $product_name,
                'madeIn'       => $madeIn,
                'pro_image'    => $name
            );

            $modelOne = $this->load->model("categoryModel");
            $rcvData['catEdit'] = $modelOne->upData($this->tableOne, $data, $company_name, $id);

            header("Location: ".BASE_URL."/Category/view"); 
        }

        public function remove($id=null){
            session_start();

            $user = $_SESSION['userData'];
            $company_name = $user['company_name'];

            $currentPic = $_REQUEST['img'];
            $path = 'images/product';
            
            unlink("$path/$currentPic");

            $modelOne = $this->load->model("categoryModel");
            $rcvData['catEdit'] = $modelOne->remove($this->tableOne, $company_name,$id);

            header("Location: ".BASE_URL."/Category/view");            
        }


    }
?>