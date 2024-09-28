<?php
class MY_Counter {

		   
public function count() { 
	$CI =& get_instance();
	$CI->load->model('Counter_Model','',TRUE);
	//$check_visitor = $CI->input->cookie('counter'); 
	$ip = $CI->input->ip_address(); 
	$hostn = gethostbyaddr($ip);
	$uname = $CI->input->user_agent();;
	$check_visitor = $CI->Counter_model->get_ip($ip);
	
	
	if ($check_visitor == FALSE) {//IP NOT EXISTS IN DB 

		$CNT = $CI->Counter_model->update_counter($ip, $hostn, $uname);
		}
			
		else{
			$CNT = $CI->Counter_model->get_counter();
		}
	 return $CNT; 
	 
	}
}
