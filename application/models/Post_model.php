<?php 

class Post_model extends CI_Model {
    public function __construct(){
        $this->load->database();
    }

    public function get_posts($slug = FALSE){
        
      if($slug === FALSE){  

        // $this->db->select("posts.id");
        // $this->db->from('posts');
        // $this->db->join('categories', 'categories.id = posts.category_id');
        // $query = $this->db->get();
        // $result=$query->result();
        // return $result;
        $this->db->select('posts.id As postID, body, title, slug, create_at, post_image,name,category_id'); 
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get('posts');
        return $query->result_array();
      } 
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();
    }

    public function create_post($data){
      
      $query=$this->db->insert('posts', $data['post'] );
      return $query;

    }

    public function delete_post($id){
      
      $this->db->where('id', $id);
      $this->db->delete('posts');
      return true;

    }

    public function update_post( $data){
      
      $this->db->where('id', $data['post']['id']);
      $query = $this->db->update('posts', $data['post']);
      return $query;
    }

    public function get_categories(){
      $this->db->order_by('name');
      $query = $this->db->get('categories');
      return $query->result_array();
    }
    
    public function get_posts_by_category($category_id){

      $this->db->order_by('posts.id', 'DESC');
      $this->db->join('categories', 'categories.id = posts.category_id');
      $query = $this->db->get_where('posts', array('category_id' => $category_id));

      return $query->result_array();

    }
}
