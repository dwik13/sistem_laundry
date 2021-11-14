<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_dashboard extends CI_Model 
{
    public function gettransaksi(){
        $query = $this->db->query('SELECT * FROM transaksi where tgl_masuk = CURRENT_DATE');
        return $query->num_rows();
    }

    public function gettransaksiselesai(){
        $query = $this->db->query('SELECT * FROM transaksi where status=2');
        return $query->num_rows();
    }

    public function gettransaksiupdate(){
        $query = "SELECT A.id_transaksi,B.nama_pelanggan,A.status
        FROM transaksi A 
        JOIN pelanggan B
        ON A.id_pelanggan = B.id_pelanggan WHERE A.tgl_transaksi = CURRENT_DATE";

        return $this->db->query($query)->result_array();
    }

    public function gettotaltrans(){
       $query = "SELECT sum(total) as totaltransaksi FROM detail_transaksi";
       return $this->db->query($query)->row_array();
    }

    public function gettranshari(){
        $query = "SELECT SUM(B.total) as total FROM detail_transaksi B JOIN transaksi A ON B.id_transaksi = A.id_transaksi WHERE A.tgl_transaksi = CURRENT_DATE";
        return $this->db->query($query)->row_array();
    }
}

// SELECT A.id_transaksi,B.nama_pelanggan,A.status
//         FROM transaksi A 
//         JOIN pelanggan B
//         ON A.id_pelanggan = B.id_pelanggan WHERE A.tgl_transaksi = CURRENT_DATE