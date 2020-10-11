<?php


class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    /*
     * Listing of users
     */
    function index()
    {
        $data['users'] = $this->User_model->get_all_users();
        $data['bidang'] = $this->User_model->get_user_bidang();
        $data['_view'] = 'user/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new user
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|max_length[256]');
        $this->form_validation->set_rules('name', 'Name', 'required|max_length[128]');
        $this->form_validation->set_rules('email', 'Email', 'required|max_length[128]|valid_email');
        $this->form_validation->set_rules('image', 'Image', 'required|max_length[128]');
        $this->form_validation->set_rules('role_id', 'Role Id', 'required|integer');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required|integer');

        if ($this->form_validation->run()) {
            $params = array(
                'role_id' => $this->input->post('role_id'),
                'password' => $this->input->post('password'),
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'image' => $this->input->post('image'),
                'is_active' => $this->input->post('is_active'),
            );

            $user_id = $this->User_model->add_user($params);
            redirect('user/index');
        } else {
            $this->load->model('User_role_model');
            $data['all_user_roles'] = $this->User_role_model->get_all_user_roles();

            $data['_view'] = 'user/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a user
     */
    function edit($id)
    {
        // check if the user exists before trying to edit it
        $data['user'] = $this->User_model->get_user($id);

        if (isset($data['user']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('password', 'Password', 'required|max_length[256]');
            $this->form_validation->set_rules('name', 'Name', 'required|max_length[128]');
            $this->form_validation->set_rules('email', 'Email', 'required|max_length[128]|valid_email');
            $this->form_validation->set_rules('image', 'Image', 'required|max_length[128]');
            $this->form_validation->set_rules('role_id', 'Role Id', 'required|integer');
            $this->form_validation->set_rules('is_active', 'Is Active', 'required|integer');

            if ($this->form_validation->run()) {
                $params = array(
                    'role_id' => $this->input->post('role_id'),
                    'password' => $this->input->post('password'),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'image' => $this->input->post('image'),
                    'is_active' => $this->input->post('is_active'),
                );

                $this->User_model->update_user($id, $params);
                redirect('user/index');
            } else {
                $this->load->model('User_role_model');
                $data['all_user_roles'] = $this->User_role_model->get_all_user_roles();

                $data['_view'] = 'user/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The user you are trying to edit does not exist.');
    }

    /*
     * Deleting user
     */
    function remove($id)
    {
        $user = $this->User_model->get_user($id);

        // check if the user exists before trying to delete it
        if (isset($user['id'])) {
            $this->User_model->delete_user($id);
            redirect('user/index');
        } else
            show_error('The user you are trying to delete does not exist.');
    }
}
