<?php
date_default_timezone_set('Asia/Kolkata');
class Dashboard_model extends CI_Model {
    
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database(); 
    }

 public function fn_update_session($id,$data){
         $this->db->where('id', $id);
         $this->db->update('ci_sessions', $data);
		 if($this->db->affected_rows() >0){
		  return true;
		  }else{
			  return false;
			  }
	

   }
   public function fn_delete_session($id='',$user_id=''){
		if(!empty($id) || !empty($user_id)){
	   		if(!empty($user_id)){
	         	$this->db->where('user_id', $user_id);
	         }
			elseif(!empty($id)){
	        	 $this->db->where('id', $id);
	         }
	         	$this->db->delete('ci_sessions');
			 if($this->db->affected_rows() >0){
			  return true;
			  }else{
				  return false;
				  }
		}else{ return false;}

   }

	public function fn_get_session($id){         
		$this->db->select('id,user_id, login_info,(FROM_UNIXTIME(timestamp)) as logintime');
		$query =  $this->db->order_by('timestamp', 'desc')->get_where('ci_sessions', array('user_id' => $id));
        return $query->result_array();
	}

	
		 public function fn_save_users($usersArr){
	 $this->db->insert('users',$usersArr);
		} 	  

  public function verify_admin_credentials($authCredentials){

        $query = $this->db->query("SELECT * FROM admin_login WHERE user_name='".$authCredentials["user_name"]."'");

        if ($query->num_rows() == 1) {         
          return $query->row_array();       
        } else {            
          return FALSE;            
        }
    }
    
	        
                
      
  public function fn_dashboard_save_users($users){
	 $this->db->insert('admin_login',$users);
		}
        			
   public function fn_users_get_data(){
		 $query =$this->db->query("SELECT * FROM admin_login ");
		 //~ $query =$this->db->query("SELECT * FROM meals WHERE 1 and status='active'");
		  //$query = $this->db->get();
		  return $query->result_array();
		}
 
 
  public function fn_update_users($id,$data){
         $this->db->where('id', $id);
         $this->db->update('admin_login', $data);
		 if($this->db->affected_rows() >0){
		  return true;
		  }else{
			  return false;
			  }
		       
   }
    public function fn_get_userslist(){
		 $query =$this->db->query("SELECT id,name,mobile,otp  FROM users WHERE 1 and status='active'");
		 //~ $query =$this->db->query("SELECT * FROM meals WHERE 1 and status='active'");
		  //$query = $this->db->get();
		  return $query->result_array();
		}
		
		
		
	 public function fn_users_update($id,$name){
         $dataArr['name']=$name;
         $this->db->where('id', $id);
         $this->db->update('users', $dataArr);
       
   }
   	
   
    public function fn_users_get_row_data($id){
		 $query =$this->db->query("SELECT *  FROM admin_login WHERE 1=1  and id='".$id."'");
		 //~ $query =$this->db->query("SELECT * FROM meals WHERE 1 and status='active'");
		  //$query = $this->db->get();
		  return $query->row_array();
		}
           
     public function total_count() {
       return $this->db->count_all("users");
    }
   
                    
}
