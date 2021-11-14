<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_paket extends CI_Model 
{
    public function getpaket(){
        return $this->db->get('paket')->result_array();
    }

    public function getpaketbyid($id){
        return $this->db->get_where('paket',['id_paket'=>$id])->row_array();
    }

    public function tambahpaket($data)
    {
         $this->db->insert('paket', $data);
    }
    
    public function updatepaket($data,$idpaket)
    {
        $this->db->where('id_paket', $idpaket);
        $this->db->update('paket', $data);
    }

    public function hapuspaket($id)
    {
        $this->db->where('id_paket',$id);
        $this->db->delete('paket');
    }

}