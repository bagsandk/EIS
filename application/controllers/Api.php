<?php

class Api extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Api_model');
    }

    /*
     * Listing of apis
     */
    function index()
    {
        $data['apis'] = $this->Api_model->get_all_apis();

        $data['_view'] = 'api/index';
        $this->load->view('layouts/main', $data);
    }

    /*
     * Adding a new api
     */
    function add()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('api_name', 'Api Name', 'required|max_length[255]');
        $this->form_validation->set_rules('url', 'Url', 'required|max_length[255]');
        $this->form_validation->set_rules('method', 'Method', 'required');

        if ($this->form_validation->run()) {
            $params = array(
                'method' => $this->input->post('method'),
                'api_name' => $this->input->post('api_name'),
                'url' => $this->input->post('url'),
            );

            $api_id = $this->Api_model->add_api($params);
            redirect('api/index');
        } else {
            $data['_view'] = 'api/add';
            $this->load->view('layouts/main', $data);
        }
    }

    /*
     * Editing a api
     */
    function edit($id)
    {
        // check if the api exists before trying to edit it
        $data['api'] = $this->Api_model->get_api($id);

        if (isset($data['api']['id'])) {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('api_name', 'Api Name', 'required|max_length[255]');
            $this->form_validation->set_rules('url', 'Url', 'required|max_length[255]');
            $this->form_validation->set_rules('method', 'Method', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    'method' => $this->input->post('method'),
                    'api_name' => $this->input->post('api_name'),
                    'url' => $this->input->post('url'),
                );

                $this->Api_model->update_api($id, $params);
                redirect('api/index');
            } else {
                $data['_view'] = 'api/edit';
                $this->load->view('layouts/main', $data);
            }
        } else
            show_error('The api you are trying to edit does not exist.');
    }

    /*
     * Deleting api
     */
    function remove($id)
    {
        $api = $this->Api_model->get_api($id);

        // check if the api exists before trying to delete it
        if (isset($api['id'])) {
            $this->Api_model->delete_api($id);
            redirect('api/index');
        } else
            show_error('The api you are trying to delete does not exist.');
    }
}
