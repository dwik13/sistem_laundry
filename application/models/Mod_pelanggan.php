<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_pelanggan extends CI_Model 
{
    public function getpelanggan()
    {
        return $this->db->get('pelanggan')->result_array();
    }

    public function tambahpelanggan($data)
    {
        $this->db->insert('pelanggan', $data);
    }

    public function getpelangganbyid($id)
    {
        return $this->db->get_where('pelanggan',['id_pelanggan'=>$id])->row_array();
    }

    public function updatepelanggan($data,$idpelanggan)
    {
        $this->db->where('id_pelanggan', $idpelanggan);
        $this->db->update('pelanggan', $data);
    }
    public function hapuspelanggan($id)
    {
        $this->db->where('id_pelanggan', $id);
        $this->db->delete('pelanggan');
    }
}