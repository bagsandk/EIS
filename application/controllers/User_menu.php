<?php


class User_menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_menu_model');
    }

    /*
     * Listing of user_menus
     */
    function index()
    {
        $data['user_menus'] = $this->User_menu_model->get_all_user_menus();

        $data['_view'] = 'user_menu/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new user_menu
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('title', 'Title', 'required|max_length[128]');
        $this->form_validation->set_rules('url', 'Url', 'required|max_length[128]');
        $this->form_validation->set_rules('icon', 'Icon', 'required|max_length[128]');
        $this->form_validation->set_rules('is_active', 'Is Active', 'required|integer');

        if ($this->form_validation->run()) {
            $params = array(
                'is_active' => $this->input->post('is_active'),
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
            );

            $user_menu_id = $this->User_menu_model->add_user_menu($params);
            redirect('user_menu/index');
        } else {
            $data['_view'] = 'user_menu/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a user_menu
     */
    function edit($id)
    {
        // check if the user_menu exists before trying to edit it
        $data['user_menu'] = $this->User_menu_model->get_user_menu($id);

        if (isset($data['user_menu']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required|max_length[128]');
            $this->form_validation->set_rules('url', 'Url', 'required|max_length[128]');
            $this->form_validation->set_rules('icon', 'Icon', 'required|max_length[128]');
            $this->form_validation->set_rules('is_active', 'Is Active', 'required|integer');

            if ($this->form_validation->run()) {
                $params = array(
                    'is_active' => $this->input->post('is_active'),
                    'title' => $this->input->post('title'),
                    'url' => $this->input->post('url'),
                    'icon' => $this->input->post('icon'),
                );

                $this->User_menu_model->update_user_menu($id, $params);
                redirect('user_menu/index');
            } else {
                $data['_view'] = 'user_menu/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The user_menu you are trying to edit does not exist.');
    }

    /*
     * Deleting user_menu
     */
    function remove($id)
    {
        $user_menu = $this->User_menu_model->get_user_menu($id);

        // check if the user_menu exists before trying to delete it
        if (isset($user_menu['id'])) {
            $this->User_menu_model->delete_user_menu($id);
            redirect('user_menu/index');
        } else
            show_error('The user_menu you are trying to delete does not exist.');
    }
}
