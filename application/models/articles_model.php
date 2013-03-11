<?php

class articles_model extends CI_Model {

    public function get_articles($num, $offset) {
        $query = $this->db->get('news', $num, $offset);
        return $query->result_array();
    }

    public function get_one_article($slug) {
        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
    }

}