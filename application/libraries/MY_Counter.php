<?php
class MY_Counter {

		   
public function count() { 
	$CI =& get_instance();
    $CI->load->model('Counter_Model','',TRUE);
    //$check_visitor = $CI->input->cookie('counter'); 
	$ip = $CI->input->ip_address(); 
	$check_visitor = $CI->Counter_model->get_ip($ip);
	
	
		if ($check_visitor == FALSE) {//IP NOT EXISTS IN DB 
		/* 	$cookie = array( 
		 "name" => "counter",
		 "value" => "$ip",
		 "expire" => time() + 7200,
		 "secure" => false ); 
		$CI->input->set_cookie($cookie); */
		$CNT = $CI->Counter_model->update_counter($ip);
		}
			
		else{
			$CNT = $CI->Counter_model->get_counter();
		}
	 return $CNT; 
	 
	}
}
