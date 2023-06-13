<?php class Categories extends CI_Controller{

    public function index(){
        $data['title'] = 'Categories';
        $data['categories'] = $this->category_model->get_categories();

        // echo '<pre>';
        // print_r($data);die();
        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }   

    public function create(){
        $data['title'] = "Create Category";

        if(!empty($_POST)){
            $this->form_validation->set_rules('name', 'Name', 'required');

            if($this->form_validation->run() === FALSE){

                $this->load->view('templates/header');
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
                
            }else{

                $data = array(
                    'name' => $this->input->post('name')
                );

                $this->category_model->create_category($data);
                redirect('categories');

            }

        }else {
            $this->load->view('templates/header');
            $this->load->view('categories/create', $data);
            $this->load->view('templates/footer');
        }
    }

    public function posts($id){
        $data['title'] = $this->category_model->get_category($id)->name;

        $data['posts'] = $this->post_model->get_posts_by_category($id);

        $this->load->view('templates/header');
        $this->load->view('categories/index', $data);
        $this->load->view('templates/footer');
    }
}