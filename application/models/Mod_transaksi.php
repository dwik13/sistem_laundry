<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_transaksi extends CI_Model 
{
    public function gettransaksi()
    {
        $query = "SELECT A.id_transaksi,B.nama_pelanggan,B.no_hp,A.tgl_masuk,A.tgl_selesai,A.status
        FROM transaksi A 
        JOIN pelanggan B
        ON A.id_pelanggan = B.id_pelanggan";
        return $this->db->query($query)->result_array();
    }

    public function gettransaksibyid($id)
    {
        $query = "SELECT A.id_transaksi,B.nama_pelanggan,B.no_hp,A.tgl_masuk,A.tgl_selesai,A.status
        FROM transaksi A 
        JOIN pelanggan B
        ON A.id_pelanggan = B.id_pelanggan where id_transaksi = $id";
        return $this->db->query($query)->row_array();
    }

    public function gettotaltrans($id)
    {
       $query = "SELECT sum(total) as totaltransaksi FROM detail_transaksi WHERE id_transaksi = $id";
       return $this->db->query($query)->row_array();
    }

    public function getpaket()
    {
        return $this->db->get('paket')->result_array();
    }

    public function getpaketselesai($id)
    {
        $query = "SELECT pengerjaan from paket where id_paket = $id";
        return $this->db->query($query)->row_array();
    }

    public function getdetailpaket($id)
    {
        $query = "SELECT B.nama_paket,B.harga_satuan,A.jumlah,A.total FROM detail_transaksi A JOIN paket B ON A.id_paket = B.id_paket WHERE id_transaksi = $id";
        return $this->db->query($query)->result_array();
    }

    public function getberatpaket($id)
    {
        $query = "SELECT harga_satuan from paket where id_paket = $id";
        return $this->db->query($query)->row_array();
    }

    public function getpelanggan()
    {
        return $this->db->get('pelanggan')->result_array();
    }

    public function getmaxtrans()
    {
        $query = "SELECT max(id_transaksi) as maxtrans from transaksi";
        return $this->db->query($query)->row_array();
    }

    public function simpantransaksi($data)
    {
        $this->db->insert('transaksi',$data);
        return $this->db->insert_id();
    }

    public function simpandetail($data2)
    {
        $this->db->insert('detail_transaksi',$data2);
    }

    public function updatedetail($id,$data)
    {
        $query = "UPDATE `transaksi` SET `status` = $data WHERE `transaksi`.`id_transaksi` = $id;";
        $this->db->query($query);
    }

    public function hapustransaksi($id)
    {
        $this->db->where('id_transaksi', $id);
        $this->db->delete('transaksi');
    }
}




//query untuk Tambah hari
// SELECT DATE_ADD('2010-01-01', INTERVAL 3 MINUTE);

// SELECT B.nama_paket,B.harga_satuan,A.jumlah,A.total FROM detail_transaksi A JOIN paket B ON A.id_paket = B.id_paket WHERE id_transaksi =
//SELECT sum(total) as totaltransaksi FROM detail_transaksi WHERE id_transaksi =