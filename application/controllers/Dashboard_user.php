<?php


class Dashboard_user extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $data['_view'] = 'dashboard';
        $this->load->view('layouts/main', $data);
    }
}
