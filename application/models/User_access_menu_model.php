<?php


class User_access_menu_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /*
     * Get user_access_menu by id
     */
    function get_user_access_menu($id)
    {
        return $this->db->get_where('user_access_menu', array('id' => $id))->row_array();
    }

    /*
     * Get all user_access_menus
     */
    function get_all_user_access_menus()
    {
        $this->db->select('* ,user_access_menu.id as "id"');
        $this->db->from('user_access_menu');
        $this->db->join('user_role', 'user_role.id = user_access_menu.role_id');
        $this->db->join('user_menu', 'user_menu.id = user_access_menu.menu_id');
        return $this->db->get()->result_array();
    }

    /*
     * function to add new user_access_menu
     */
    function add_user_access_menu($params)
    {
        $this->db->insert('user_access_menu', $params);
        return $this->db->insert_id();
    }

    /*
     * function to update user_access_menu
     */
    function update_user_access_menu($id, $params)
    {
        $this->db->where('id', $id);
        return $this->db->update('user_access_menu', $params);
    }

    /*
     * function to delete user_access_menu
     */
    function delete_user_access_menu($id)
    {
        return $this->db->delete('user_access_menu', array('id' => $id));
    }
}
