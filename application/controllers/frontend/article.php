<?php

class Article extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('articles_model');
    }

    public function index() {



        $this->load->library('pagination');
       // $config['use_page_numbers'] = TRUE;
        $config['uri_segment'] = 4;
        $config['num_links'] = 3;
        $config['next_link'] = 'next';
        $config['prev_link'] = 'previous';
        $config['base_url'] = 'http://localhost/article/index.php/frontend/article/index/';
        $config['per_page'] = 5;
        $config['total_rows'] = $this->db->count_all('news');
        $this->pagination->initialize($config);
        
        $data['title'] = "ARTICLES";
        $data['news'] = $this->articles_model->get_articles($config['per_page'], $this->uri->segment(4));
        $this->load->view('templates/header', $data);
        
        $this->load->view('articles/index', $data);
        $this->load->view('templates/footer');
    }

    public function articles($slug) {
        $data['article_item'] = $this->articles_model->get_one_article($slug);

        if (empty($data['article_item'])) {
            show_404();
        }

        $data['title'] = $data['article_item']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('articles/view', $data);
        $this->load->view('templates/footer');
    }

    public function create() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create new article';

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('text', 'text', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('articles/create');
            $this->load->view('templates/footer');
        } else {
            $this->article_model->set_article();
            $this->load->view('articles/success');
        }
    }

}