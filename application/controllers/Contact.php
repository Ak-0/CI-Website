<?php

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['form', 'url','email','array']);
        $this->load->library(['form_validation', 'session']);
        $this->load->library('email');
    }


    // Handle form submission
    public function submit()
    {
		$formData = $this->input->post();
        // Define validation rules

        $this->form_validation->set_rules( 'name', $formData['name'], 'required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('subject', $formData['subject'], 'required|max_length[20]');
        $this->form_validation->set_rules('email',  $formData['email'], 'required|valid_email');
        $this->form_validation->set_rules('message', $formData['message'],'required');
			if ($this->form_validation->run()==FALSE) {
					$this->session->set_flashdata('error',validation_errors() );
					redirect('http://'.base_url().'contact');
			}
		else{
		// Set email settings
			$this->email->from('ark@graycode.projectdev.net', $formData['email']);
			$this->email->to('ark@graycode.projectdev.net');
			$this->email->subject($formData['subject'] );
			$this->email->message($formData['message']);
		// Send the email
			if($this->email->send(FALSE)){
				$this->session->set_flashdata('success', 'Your message has been sent.');
				redirect('http://'.base_url().'contact');
			}
		
			

        }
    }
}
