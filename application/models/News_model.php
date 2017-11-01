<?php
class News_model extends CI_Model {

        public function __construct() {
            $this->load->database();
      		$this->load->library('pagination');
			  }



public function get_news(){
		$config['base_url'] = base_url() . 'news/index/';
		$config['uri_segment'] = 3;
		$config['total_rows'] = $this->db->count_all('news');
		$config['per_page'] = 4;
		$config['num_tag_open'] = '<div class=\'digit\'>';
		$config['num_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<div class=\'digit current\'>';
		$config['cur_tag_close'] = '</div>';
		$config['prev_link'] = FALSE;
		$config['next_link'] = FALSE;





		$config['use_page_numbers'] = TRUE;
		$page_number = $this->uri->segment(3);
		$offset = ($page_number == 1 || $page_number == NULL) ? 0 : ($page_number * $config['per_page']) - $config['per_page'];
		$this->db->order_by("id","desc");
        $query = $this->db->get('news', $config['per_page'], $offset);
		$this->pagination->initialize($config);
		$pages =  $this->pagination->create_links();
		$rows =  $query->result_array();
		return array('rows' => $rows,	'pages' => $pages);
}

public function set_news(){
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text')
    );
    return $this->db->insert('news', $data);
}
}

