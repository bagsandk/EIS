<?php


class Bidang_access_api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get bidang_access_api by id
     */
    function get_bidang_access_api($id)
    {
        return $this->db->get_where('bidang_access_api', array('id' => $id))->row_array();
    }

    /*
     * Get all bidang_access_apis
     */
    function get_all_bidang_access_apis()
    {
        $this->db->select('*,bidang_access_api.id as "id"');
        $this->db->from('bidang_access_api');
        $this->db->join('bidang', 'bidang.id = bidang_access_api.bidang_id');
        $this->db->join('api', 'api.id = bidang_access_api.api_id');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new bidang_access_api
     */
    function add_bidang_access_api($params)
    {
        $this->db->insert('bidang_access_api', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update bidang_access_api
     */
    function update_bidang_access_api($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('bidang_access_api', $params);
    }

    /*
     * function to delete bidang_access_api
     */
    function delete_bidang_access_api($id)
    {
        return $this->db->delete('bidang_access_api', array('id' => $id));
    }
}
