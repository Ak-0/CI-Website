<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		
        $this->load->helper(array('form','url','array'));
        $this->load->library(array('session', 'form_validation', 'email','MY_Counter'));
    }

    function index()
    {	
        //set validation rules
        $this->form_validation->set_rules('name', 'Name', 'trim|required|xss_clean|callback_alpha_space_only');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|required|xss_clean');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean');
		$data['subject_opts'] = array(
			'code-gray-service:vpn' => 'VPN Server Account',
			'code-gray-service:email' => 'E-mail Account',
			'code-gray-service:irc' => 'IRC Bouncer Account',
			'code-gray-service:linux' => 'Linux Admin Help',
			'code-gray-service:other' => 'Other Reason',
			);
			
        //run validation on form input
        if ($this->form_validation->run() == FALSE)
        {

        //validation fails
        
		$data['count'] = $this->my_counter->count();
		$data['page_title'] = 'Gray-Code Contact';
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('contact', $data);
        $this->load->view('templates/footer', $data);
        }
        else
        {	


            //get the form data
            $name = $this->input->post('name');
            $from_email = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            //set to_email id to which you want to receive mails
            $to_email = 'gray@code-gray.psychos.is';

            //configure email settings
			$config['validate'] = FALSE;
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'code-gray.psychos.is';
            $config['smtp_port'] = '25';
            $config['smtp_user'] = 'gray';
            $config['smtp_pass'] = 'Gr4y./';
            $config['mailtype'] = 'html';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
            $config['newline'] = "\r\n"; //use double quotes
            $this->email->initialize($config);                        

            //send mail
            $this->email->from($from_email, $name);
            $this->email->to($to_email);
            $this->email->subject($subject);
            $this->email->message($message);
            if ($this->email->send())
            {
                // mail sent
                $this->session->set_flashdata('msg','<div class="alert alert-success text-center">Your mail has been sent successfully!</div>');
                redirect('contact');
            }
            else
            {
                //error
                $this->session->set_flashdata('msg','<div class="alert alert-danger text-center">There is error in sending mail! Please try again later</div>');
                redirect('contact');
            }
        }
    }
    
    //custom validation function to accept only alphabets and space input
    function alpha_space_only($str)
    {
        if (!preg_match("/^[a-zA-Z ]+$/",$str))
        {
            $this->form_validation->set_message('alpha_space_only', 'The %s field must contain only alphabets and space');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}
?>
