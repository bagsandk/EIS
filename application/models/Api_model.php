<?php


class Api_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get api by id
     */
    function get_api($id)
    {
        return $this->db->get_where('api', array('id' => $id))->row_array();
    }

    /*
     * Get all apis
     */
    function get_all_apis()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('api')->result_array();
    }

    /*
     * function to add new api
     */
    function add_api($params)
    {
        $this->db->insert('api', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update api
     */
    function update_api($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('api', $params);
    }

    /*
     * function to delete api
     */
    function delete_api($id)
    {
        return $this->db->delete('api', array('id' => $id));
    }
}
