<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mod_dashboard','dashboard');
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Dashboard";
        $data['laundrymasuk'] = $this->dashboard->gettransaksi();
        $data['laundryselesai'] = $this->dashboard->gettransaksiselesai();
        $data['transaksi'] = $this->dashboard->gettransaksiupdate();
        $data['totrans'] = $this->dashboard->gettotaltrans();
        $data['transhari'] = $this->dashboard->gettranshari();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('dashboard/index');
        $this->load->view('templates/footer');
    }
}