<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
*/

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH.'libraries/REST_Controller.php';

class Investoptions extends REST_Controller
{
	function __construct()
    {
        // Construct our parent class
        parent::__construct();
        $this->load->library('custom_functions');	        
           
    }
      

	public function invest_post(){ 

		if ($this->input->get('minimum_constraints')!='' ) {
			$min_invest=json_decode($this->input->get('minimum_constraints'),true);
			$errors=array();	
			if(!is_array($min_invest)){
				$errors[]='minimum_constraints must be in json format';				
			}
			
		}else{
			$errors[]='minimum_constraints must be in json format';
		}
		if(empty($this->input->get('total_amount')) || !is_numeric($this->input->get('total_amount'))){
				$errors[]='total_amount must be numberic and not null';
		}
		if( sizeof($errors) > 0){
				$result=array('status'=>'error','errors' =>$errors );    	
				$this->response($result,404);
		}
		else{				
			(int)$total_amount=$this->input->get('total_amount');
			$final_min_invest= $this->custom_functions->min_invest_avg($min_invest,$total_amount) ;
			$min_invest = array_fill_keys(array_keys($min_invest), 0);
			if(!empty($final_min_invest)){
				$final_min_invest_sum=array_sum($final_min_invest);
				$diff=$total_amount-$final_min_invest_sum;
				$avg=($diff+$final_min_invest_sum)/sizeof($final_min_invest);
				$avg = $avg - ($avg % 1000);
				$output = array();
				foreach ($final_min_invest as $key => $value) {
					if($value<$avg){
						$addon=floor($avg-$value);
						if($diff>=$addon){
							$output[$key]=$value+$addon;
							$diff=$diff-$addon;
						}else{
							$output[$key]=$value;
						}             
					}else{ 
						$output[$key]=$value;
					}

					$min_invest[$key] =$output[$key];
				}

				$array_keys=array_keys($output);
				$min_invest[$array_keys[0]]=$output[$array_keys[0]]+$diff;
			}
			//$data=json_encode($min_invest,true);
			$result=array('status'=>'success', 'total_amount'=>$total_amount,'data'=>$min_invest);    	
			$this->response($result,200);
		}

	}
}	



?>