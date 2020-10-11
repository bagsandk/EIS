<?php

class Bidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bidang_model');
    }

    /*
     * Listing of bidangs
     */
    function index()
    {
        $data['bidangs'] = $this->Bidang_model->get_all_bidangs();

        $data['_view'] = 'bidang/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new bidang
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('bidang', 'Bidang', 'required|max_length[255]');

        if ($this->form_validation->run()) {
            $params = array(
                'bidang' => $this->input->post('bidang'),
            );

            $bidang_id = $this->Bidang_model->add_bidang($params);
            redirect('bidang/index');
        } else {
            $data['_view'] = 'bidang/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a bidang
     */
    function edit($id)
    {
        // check if the bidang exists before trying to edit it
        $data['bidang'] = $this->Bidang_model->get_bidang($id);

        if (isset($data['bidang']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('bidang', 'Bidang', 'required|max_length[255]');

            if ($this->form_validation->run()) {
                $params = array(
                    'bidang' => $this->input->post('bidang'),
                );

                $this->Bidang_model->update_bidang($id, $params);
                redirect('bidang/index');
            } else {
                $data['_view'] = 'bidang/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The bidang you are trying to edit does not exist.');
    }

    /*
     * Deleting bidang
     */
    function remove($id)
    {
        $bidang = $this->Bidang_model->get_bidang($id);

        // check if the bidang exists before trying to delete it
        if (isset($bidang['id'])) {
            $this->Bidang_model->delete_bidang($id);
            redirect('bidang/index');
        } else
            show_error('The bidang you are trying to delete does not exist.');
    }
}
