<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_user extends CI_Model 
{

    public function tambahuser($data)
    {
        $this->db->insert('user', $data);
    }

    public function getuser()
    {
        $query = "SELECT A.id_user,A.username,A.password,B.role FROM user A JOIN role B ON A.id_role = B.id_role";;
        return $this->db->query($query)->result_array();
    }

    public function getuserbyid($id)
    {
        $query = "SELECT id_user,username,id_role FROM user WHERE id_user = $id";
        return $this->db->query($query)->row_array();
    }

    public function edituser($data)
    {
        $iduser = $this->input->post('id_user');
        $this->db->where('id_user', $iduser);
        $this->db->update('user', $data);
    }

    public function deleteuser($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

}