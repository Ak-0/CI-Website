<?php
  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Counter_model extends CI_Model {


	 function __construct(){
					parent::__construct();	
					$this->load->database();
				}
					
	 function get_ip($ip) {
		 $query = $this->db->query('SELECT ip FROM count WHERE ip = "'.$ip.'" ');
		 $row = $query->row();
		if (isset($row))
		{
		 return TRUE;
		}
		else{return FALSE;}
	 }
	function get_counter(){
		$query = $this->db->select('counter')->order_by('counter','desc')->limit(1)->get('count')->row('counter');
		return $query;
		}
		 
	 function update_counter($ip,$host,$uname) {
		$CNTR = $this->get_counter()+1;    
		$query = $this->db->simple_query(' INSERT INTO count (counter,ip,hostn,uname) VALUES('.$CNTR.',"'.$ip.'","'.$host.'","'.$uname.'") ');
		if($query){
  	    return $CNTR;
				}
		} 
}
