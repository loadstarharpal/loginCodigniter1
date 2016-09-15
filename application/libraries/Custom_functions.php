<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Custom_functions  {

//funnction check min amount return array of n and min_invest,
    
	public function min_invest_avg($min_invest,$total_amount) {
	        asort($min_invest);
	        $minimum_amount_required=array_sum($min_invest);      
	        if($minimum_amount_required>$total_amount){
	            array_pop($min_invest);
	           return $this->min_invest_avg($min_invest,$total_amount);
	        }
	        return $min_invest;
	}


}

/* End of file Someclass.php */
?>
