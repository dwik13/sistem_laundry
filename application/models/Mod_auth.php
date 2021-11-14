<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_auth extends CI_Model 
{
    public function getuser($username){
        return $this->db->get_where('user',['username'=>$username])->row_array();
    }
}