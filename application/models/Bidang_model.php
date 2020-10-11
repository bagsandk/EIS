<?php


class Bidang_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get bidang by id
     */
    function get_bidang($id)
    {
        return $this->db->get_where('bidang', array('id' => $id))->row_array();
    }

    /*
     * Get all bidangs
     */
    function get_all_bidangs()
    {
        $this->db->order_by('id', 'desc');
        return $this->db->get('bidang')->result_array();
    }

    /*
     * function to add new bidang
     */
    function add_bidang($params)
    {
        $this->db->insert('bidang', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update bidang
     */
    function update_bidang($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('bidang', $params);
    }

    /*
     * function to delete bidang
     */
    function delete_bidang($id)
    {
        return $this->db->delete('bidang', array('id' => $id));
    }
}
