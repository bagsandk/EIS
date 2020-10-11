<?php

class Bidang_access_api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Bidang_access_api_model');
    }

    /*
     * Listing of bidang_access_apis
     */
    function index()
    {
        $data['bidang_access_apis'] = $this->Bidang_access_api_model->get_all_bidang_access_apis();

        $data['_view'] = 'bidang_access_api/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new bidang_access_api
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('bidang_id', 'Bidang Id', 'required|integer');
        $this->form_validation->set_rules('api_id', 'Api Id', 'required|integer');

        if ($this->form_validation->run()) {
            $params = array(
                'bidang_id' => $this->input->post('bidang_id'),
                'api_id' => $this->input->post('api_id'),
            );

            $bidang_access_api_id = $this->Bidang_access_api_model->add_bidang_access_api($params);
            redirect('bidang_access_api/index');
        } else {
            $this->load->model('Bidang_model');
            $data['all_bidangs'] = $this->Bidang_model->get_all_bidangs();

            $this->load->model('Api_model');
            $data['all_apis'] = $this->Api_model->get_all_apis();

            $data['_view'] = 'bidang_access_api/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a bidang_access_api
     */
    function edit($id)
    {
        // check if the bidang_access_api exists before trying to edit it
        $data['bidang_access_api'] = $this->Bidang_access_api_model->get_bidang_access_api($id);

        if (isset($data['bidang_access_api']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('bidang_id', 'Bidang Id', 'required|integer');
            $this->form_validation->set_rules('api_id', 'Api Id', 'required|integer');

            if ($this->form_validation->run()) {
                $params = array(
                    'bidang_id' => $this->input->post('bidang_id'),
                    'api_id' => $this->input->post('api_id'),
                );

                $this->Bidang_access_api_model->update_bidang_access_api($id, $params);
                redirect('bidang_access_api/index');
            } else {
                $this->load->model('Bidang_model');
                $data['all_bidangs'] = $this->Bidang_model->get_all_bidangs();

                $this->load->model('Api_model');
                $data['all_apis'] = $this->Api_model->get_all_apis();

                $data['_view'] = 'bidang_access_api/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The bidang_access_api you are trying to edit does not exist.');
    }

    /*
     * Deleting bidang_access_api
     */
    function remove($id)
    {
        $bidang_access_api = $this->Bidang_access_api_model->get_bidang_access_api($id);

        // check if the bidang_access_api exists before trying to delete it
        if (isset($bidang_access_api['id'])) {
            $this->Bidang_access_api_model->delete_bidang_access_api($id);
            redirect('bidang_access_api/index');
        } else
            show_error('The bidang_access_api you are trying to delete does not exist.');
    }
}
