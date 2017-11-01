<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

        public function __construct()
        {
        parent::__construct();
        $this->load->model('news_model');
        $this->load->helper('url');
	  	$this->load->helper('array');
		$this->load->helper('form');
		$this->load->library('MY_Counter');
		$this->load->library('pagination');
        }

        public function index()
{
	
		$data['news'] = $this->news_model->get_news('rows');
        $data['title'] = 'News';
		$data['page_title'] = 'Gray-Code Home';
		$data['count'] = $this->my_counter->count();
		$data['pages'] = $this->news_model->get_news('pages') ;
        $this->load->view('templates/header', $data);
		$this->load->view('templates/nav', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer',$data);
}
        
/* 	public function view($slug = NULL)
{
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];
        $this->load->view('header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('footer',$data);
} */
	public function create()
{

	$this->load->library('form_validation');
	$data['page_title'] = 'Create a item';
	$data['count'] = $this->my_counter->count();
	$data['title'] = 'Create a item';
	$this->load->view('templates/header', $data);    
	$this->load->view('templates/nav', $data);
	$this->form_validation->set_rules('title', 'Title', 'required');
	$this->form_validation->set_rules('text', 'Text', 'required');
	$data['textarea'] = array(
  	    'name'        => 'text',
 	    'id'          => 'text',
  	    'rows'        => '100',
  	    'cols'        => '20',
  	    'style'       => 'min-width:140px',
	    'maxlength'	  => '500'
 	   );
	if ($this->form_validation->run() === FALSE)
    {
		$this->load->view('news/create',$data);    
		}
	else{
        $this->news_model->set_news();
        $this->load->view('news/success');
		}
    $this->load->view('templates/footer');
}
        
        
        
}
