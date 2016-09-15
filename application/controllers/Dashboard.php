<?php  if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        $this->load->model('dashboard_model');
        $this->load->driver('cache', array('adapter' => 'file', 'backup' => 'file'));
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('security');
        $date = date_create();
        $this->timestamp = date_timestamp_get($date);
        // $this->load->library("pagination");
         $this->load->helper("url");
    }
   

    public function index() {
        if (!$this->session->userdata("userInfo") ) {
            header("Location:/dashboard/login");
        } elseif($this->session->userdata("role")=="admin") {
            
           $data["loggedInSessions"] =$this->dashboard_model->fn_get_session($this->session->userid);
            $data["user_name"] =  $this->session->userdata("userInfo");
            $data['userimg']=$this->session->userdata("image_path");
            $data['session_id']=$this->session->session_id;
           $this->load->view('templates/header', $data);
            $this->load->view('dashboard/dashboard', $data);
        }
    }

 public function clientInfo(){
        $this->load->library('user_agent');
        if ($this->agent->is_browser()){
            $agent = $this->agent->browser();
        }
        elseif ($this->agent->is_robot()){
            $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile()){
            $agent = $this->agent->mobile();
        }
        else{
            $agent = 'Unidentified User Agent';
        }
        $ip = $this->input->ip_address();

        
        $getloc = json_decode(file_get_contents("http://ipinfo.io/$ip"));
        
        return $agent.'/'. $this->agent->platform().'/'. $getloc->city; 
    }
    public function login() {
       
        if ($this->session->userdata("userInfo")!='') {
            header("Location:/dashboard");
        }
        $this->form_validation->set_rules('user_name', 'user_name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $data['errors']= validation_errors(); 
            $this->load->view('dashboard/login',$data);
        } else {
            $user_name = $this->input->post("user_name");
            $password = md5($this->input->post('password'));
            $authCredentials = array("user_name" => $user_name, "password" => $password);
            $result = $this->dashboard_model->verify_admin_credentials($authCredentials);
             
            if ($result != FALSE) {
                if ($password == trim($result['password'])) {                   
                    $this->session->set_userdata("userInfo",$user_name);                    
                    $this->session->set_userdata("userid",$result['id']);
                    $this->session->set_userdata("image_path",$result['image_path']);                   
                    $this->session->set_userdata("role", trim($result['role']));
                    $client_data['login_info']=  $this->clientInfo();
                    $client_data['user_id']=  $this->session->userid;
                    $this->dashboard_model->fn_update_session($this->session->session_id,$client_data);
                   
                    if($this->session->userdata("role")=='delivery manager'){
                             header("Location:/dashboard/deliveryboard");
                            
                            }
                        elseif($this->session->userdata("role")=='admin'){
                             header("Location:/dashboard");
                            
                            }
                } else {
                    $this->session->set_userdata("successMessage", 'Invalid username or password');
                    $this->load->view('dashboard/login');
                }
            } else {
                $this->session->set_userdata("successMessage",'Invalid username or password');
                $this->load->view('dashboard/login');
            }
        }
    }

    public function logout() {
        $this->session->unset_userdata("userInfo");
         $this->session->sess_destroy();
        header('Location: /dashboard/login');
    }

public function forceLogout() {
    $user_id=0;
    if ( $this->input->post("id")) {
        $id=$this->input->post("id");
    }else{$id=0;
        $user_id=$this->session->userid;
    }
    $this->dashboard_model->fn_delete_session($id,$user_id);
        header('Location: /dashboard/login');
    
    }
   
  
    public function users() {
        if (!$this->session->userdata('userInfo')) {
            header("Location:/dashboard/login");
        } elseif($this->session->userdata('role')=="admin") {
            $usersArr = array();
            if ($this->input->post('name')) {
                $usersArr['name'] = $this->input->post('name');
                $usersArr['status'] = $this->input->post('status');
                $usersArr['mobile'] = $this->input->post('mobile');
                $usersArr['otp'] = $this->input->post('otp');
                $usersArr ['created_date'] = date("Y-m-d H:i:s");
                $this->dashboard_model->fn_save_users($usersArr);
                header("Location:/dashboard/users");
            }
            $data["usersArr"] = $this->dashboard_model->fn_get_userslist();

            $user_name=  $this->session->userdata('userInfo');
            $data["user_name"] = $user_name;
           $image=$this->session->userdata('image_path');
            $data['userimg']=$image;
           $this->load->view('templates/header', $data);
            $this->load->view('dashboard/users', $data);
        }
    }

            
/*******************users**********************************************************************************************/


 public function addUsers() {
        if (!$this->session->userdata('userInfo')) {
            header("Location:/dashboard/login");
        } elseif($this->session->userdata('role')=="admin") {
            $users = array();
            if ($this->input->post('submit')) {
                $users['user_name'] = $this->input->post('user_name');
                $users['password'] = md5($this->input->post('password'));               
                $users['mobile'] = $this->input->post('mobile');
                $users['status'] = $this->input->post('status');
                $users['role'] = $this->input->post('role');
        
             
                $this->dashboard_model->fn_dashboard_save_users($users);
                header("Location:/dashboard/addUsers");
            }
           
            
           $user_name=  $this->session->userdata('userInfo');
            $data["user_name"] = $user_name;
           $image=$this->session->userdata('image_path');
            $data['userimg']=$image;
           $this->load->view('templates/header', $data);
            $this->load->view('dashboard/users/add-users', $users);
        }
    }

 public function adminuser(){
        if (!$this->session->userdata('userInfo')) {
            header("Location:/dashboard/login");
        } elseif($this->session->userdata('role')=="admin") {
            $data["usersArr"] = $this->dashboard_model->fn_users_get_data();
           
           $user_name=  $this->session->userdata('userInfo');
            $data["user_name"] = $user_name;
           $image=$this->session->userdata('image_path');
            $data['userimg']=$image;
           $this->load->view('templates/header', $data);
            $this->load->view('dashboard/users/list-users', $data);
            
        }
    }

    
public function editUsers($id) {
        if (!$this->session->userdata('userInfo')) {
            header("Location:/dashboard/login");
        } elseif($this->session->userdata('role')=="admin") {
            $deliveryboy = array();
            if ($this->input->post('submit')) {
                $users['user_name'] = $this->input->post('user_name');
                   if ($this->input->post('password') && !empty($this->input->post('password'))) {
                      $users['password'] = md5($this->input->post('password'));
                   }
                $users['mobile'] = $this->input->post('mobile');
                $users['status'] = $this->input->post('status');
                $users['role'] = $this->input->post('role');
             
               
                                   
         $this->dashboard_model->fn_update_users($id, $users);
                header("Location:/dashboard/users");
            }
            $data = array();
            $data['users'] = $this->dashboard_model->fn_users_get_row_data($id);
           $user_name=  $this->session->userdata('userInfo');
            $data["user_name"] = $user_name;
           $image=$this->session->userdata("image_path");
            $data['userimg']=$image;
           $this->load->view('templates/header', $data);
            $this->load->view('dashboard/users/edit-users', $data);
        }
    }
    
    

     }
     
     
     
     
     
    

