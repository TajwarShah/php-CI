<?php 
class Posts extends CI_Controller{
    
    public function index()
    {
        $data['title'] = "Latest Posts";

        $data['posts'] = $this->post_model->get_posts();
        // echo '<pre>';
        // print_r($data);die();
        $this->load->view('templates/header');
        $this->load->view('posts/index', $data);
        
        $this->load->view('templates/footer');
    }

    public function view($slug = FALSE){
        $data['post'] = $this->post_model->get_posts($slug);

        if($slug === FALSE){
            show_404();
        }
        
        $data['title'] = $data['post']['title'];

        $this->load->view('templates/header');
        $this->load->view('posts/view', $data);
        $this->load->view('templates/footer');
    }

    public function create(){
    
        $data['title'] = "Create Post";
        // $data['categories'] = $this->post_model->get_categories();

        if(!empty($_POST)){
            
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');

            if($this->form_validation->run() !== FALSE){
                
                $slug = url_title($this->input->post('title'),'dash', TRUE);
               

                $data['post'] = array(
                    'title' => $this->input->post('title'),
                    'slug' => $slug,
                    'body' => $this->input->post('body'),
                    'category_id' => $this->input->post('category_id')
                );
                
                $config['upload_path'] = "./assets/images/posts";    
                $config['allowed_types'] = "gif|png|jpg";
                $config['max_size'] = "10000";
                $config['max-width'] = "50000";
                $config['max_height'] = "50000";
           
                $this->load->library('upload', $config);
                   
                if(!$this->upload->do_upload()){ 
                     // If not uploaded then show the error and set default image
                    $errors = array('error' => $this->upload->display_errors());
                    $post_image = 'no-image.jpg';

                }else{
                    //if uploaded then do the following
                    $uploaded_data = array('upload_data' => $this->upload->data());
                    $post_image = $_FILES['userfile']['name'];
                }

                $data['post']['post_image'] = $post_image; 
               
                $result=$this->post_model->create_post($data);
                redirect('posts');

                if($result == TRUE){

                    $this->load->view('templates/header');
                    $this->load->view('templates/footer');

                    echo "Post created and stored in db!";
                    
                }
                else {
                    echo "error creating post";
                }
            }

            else{

                $this->load->view('templates/header');
                $this->load->view('posts/create', $data);
                $this->load->view('templates/footer');
            }
        }

        else{
                
            $this->load->view('templates/header');
            $this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function update($slug){

        $data['post'] = $this->post_model->get_posts($slug);
        $data['categories'] = $this->post_model->get_categories();

        if($slug === FALSE){
            show_404();
        }
        
        $data['title'] = "Edit Post";

        $this->load->view('templates/header');
        $this->load->view('posts/update', $data);
        $this->load->view('templates/footer');
    }

    public function edit(){

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('body', 'Body', 'required');
            $data['categories'] = $this->post_model->get_categories();
            $data['title'] = "Edit Post";

            if($this->form_validation->run() !== FALSE){
                
                $slug = url_title($this->input->post('title'),'dash', TRUE); 
                $data['table'] = "posts";
                
                $data['post'] = array(
                    'id' => $this->input->post('id'),
                    'title' => $this->input->post('title'),
                    'slug' => $slug,
                    'body' => $this->input->post('body'),
                    'category_id' => $this->input->post('category_id')
                );

                $result = $this->post_model->update_post($data);

                if($result == TRUE){
                    echo "Post updated!";
                }
                else {
                    echo "Something went wrong in post updating";
                }
            
            }else {
                
                $data['post'] = $this->post_model->get_posts($_POST['slug']);

                $this->load->view('templates/header');
                $this->load->view('posts/update', $data);
                $this->load->view('templates/footer');
            }
      }

    public function delete($id) {

        $this->post_model->delete_post($id);
        redirect('posts');
    }
}
