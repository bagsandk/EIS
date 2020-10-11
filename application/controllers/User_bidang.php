<?php


class User_bidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_bidang_model');
    }

    /*
     * Listing of user_bidangs
     */
    function index()
    {
        $data['user_bidangs'] = $this->User_bidang_model->get_all_user_bidangs();

        $data['_view'] = 'user_bidang/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new user_bidang
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_id', 'User Id', 'required|integer');
        $this->form_validation->set_rules('bidang_id', 'Bidang Id', 'required|integer');

        if ($this->form_validation->run()) {
            $params = array(
                'user_id' => $this->input->post('user_id'),
                'bidang_id' => $this->input->post('bidang_id'),
            );

            $user_bidang_id = $this->User_bidang_model->add_user_bidang($params);
            redirect('user_bidang/index');
        } else {
            $this->load->model('User_model');
            $data['all_users'] = $this->User_model->get_all_users();

            $this->load->model('Bidang_model');
            $data['all_bidangs'] = $this->Bidang_model->get_all_bidangs();

            $data['_view'] = 'user_bidang/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a user_bidang
     */
    function edit($id)
    {
        // check if the user_bidang exists before trying to edit it
        $data['user_bidang'] = $this->User_bidang_model->get_user_bidang($id);

        if (isset($data['user_bidang']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('user_id', 'User Id', 'required|integer');
            $this->form_validation->set_rules('bidang_id', 'Bidang Id', 'required|integer');

            if ($this->form_validation->run()) {
                $params = array(
                    'user_id' => $this->input->post('user_id'),
                    'bidang_id' => $this->input->post('bidang_id'),
                );

                $this->User_bidang_model->update_user_bidang($id, $params);
                redirect('user_bidang/index');
            } else {
                $this->load->model('User_model');
                $data['all_users'] = $this->User_model->get_all_users();

                $this->load->model('Bidang_model');
                $data['all_bidangs'] = $this->Bidang_model->get_all_bidangs();

                $data['_view'] = 'user_bidang/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The user_bidang you are trying to edit does not exist.');
    }

    /*
     * Deleting user_bidang
     */
    function remove($id)
    {
        $user_bidang = $this->User_bidang_model->get_user_bidang($id);

        // check if the user_bidang exists before trying to delete it
        if (isset($user_bidang['id'])) {
            $this->User_bidang_model->delete_user_bidang($id);
            redirect('user_bidang/index');
        } else
            show_error('The user_bidang you are trying to delete does not exist.');
    }
}
