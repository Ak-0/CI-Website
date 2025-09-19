<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts extends CI_Controller {
	  private $client;

	    public function __construct()
    {
        parent::__construct();
		$this->client = new \Github\Client();

    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper(array('form','url','cookie'));
        $this->load->library(array('session','MY_Counter','form_validation', 'email'));
   		$data['count'] = $this->my_counter->count();
		$data['commits'] = $this->client->api('repo')->commits()->all('Ak-0', 'CI-Website', array('sha' => 'master'));
		$data['page_title'] = 'Gray-Code';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('posts', $data);
        $this->load->view('templates/footer', $data);
	}
}
