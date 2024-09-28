<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
public function view($page = 'works')
{		
        if ( ! file_exists(APPPATH.'views/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
		
        $this->load->helper(array('form','url','cookie'));
        $this->load->library(array('session','form_validation', 'email'));
        
        $data['title'] = ucfirst($page); // Capitalize the first letter

		$data['page_title'] = 'Gray-Code';
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view($page, $data);
#		$data['count'] = $this->my_counter->count();
        $this->load->view('templates/footer', $data);


}

}
