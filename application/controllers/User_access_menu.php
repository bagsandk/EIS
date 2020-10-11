<?php


class User_access_menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_access_menu_model');
    }

    /*
     * Listing of user_access_menus
     */
    function index()
    {
        $data['user_access_menus'] = $this->User_access_menu_model->get_all_user_access_menus();

        $data['_view'] = 'user_access_menu/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new user_access_menu
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('role_id', 'Role Id', 'required|integer');
        $this->form_validation->set_rules('menu_id', 'Menu Id', 'required|integer');

        if ($this->form_validation->run()) {
            $params = array(
                'role_id' => $this->input->post('role_id'),
                'menu_id' => $this->input->post('menu_id'),
            );

            $user_access_menu_id = $this->User_access_menu_model->add_user_access_menu($params);
            redirect('user_access_menu/index');
        } else {
            $this->load->model('User_role_model');
            $data['all_user_roles'] = $this->User_role_model->get_all_user_roles();

            $this->load->model('User_menu_model');
            $data['all_user_menus'] = $this->User_menu_model->get_all_user_menus();

            $data['_view'] = 'user_access_menu/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a user_access_menu
     */
    function edit($id)
    {
        // check if the user_access_menu exists before trying to edit it
        $data['user_access_menu'] = $this->User_access_menu_model->get_user_access_menu($id);

        if (isset($data['user_access_menu']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('role_id', 'Role Id', 'required|integer');
            $this->form_validation->set_rules('menu_id', 'Menu Id', 'required|integer');

            if ($this->form_validation->run()) {
                $params = array(
                    'role_id' => $this->input->post('role_id'),
                    'menu_id' => $this->input->post('menu_id'),
                );

                $this->User_access_menu_model->update_user_access_menu($id, $params);
                redirect('user_access_menu/index');
            } else {
                $this->load->model('User_role_model');
                $data['all_user_roles'] = $this->User_role_model->get_all_user_roles();

                $this->load->model('User_menu_model');
                $data['all_user_menus'] = $this->User_menu_model->get_all_user_menus();

                $data['_view'] = 'user_access_menu/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The user_access_menu you are trying to edit does not exist.');
    }

    /*
     * Deleting user_access_menu
     */
    function remove($id)
    {
        $user_access_menu = $this->User_access_menu_model->get_user_access_menu($id);

        // check if the user_access_menu exists before trying to delete it
        if (isset($user_access_menu['id'])) {
            $this->User_access_menu_model->delete_user_access_menu($id);
            redirect('user_access_menu/index');
        } else
            show_error('The user_access_menu you are trying to delete does not exist.');
    }
}
