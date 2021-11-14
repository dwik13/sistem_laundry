<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mod_pelanggan', 'pelanggans');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Data Pelanggan";
        $data['data_pelanggan'] = $this->pelanggans->getpelanggan();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('pelanggan/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambahpelanggan()
    {
        $this->form_validation->set_rules('namapelanggan','Nama Pelanggan','required|trim');
        $this->form_validation->set_rules('nohp','No Handphone','required|numeric|trim');
            if($this->form_validation->run() == false){
                $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
                $data['title'] = "Data Pelanggan";
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar',$data);
                $this->load->view('pelanggan/tambah_pelanggan',$data);
                $this->load->view('templates/footer');
            } else{
                $data = array(
                    'nama_pelanggan' => $this->input->post('namapelanggan',true),
                    'no_hp' => $this->input->post('nohp',true)
                );
                $this->pelanggans->tambahpelanggan($data);
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data pelanggan berhasil ditambah !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('pelanggan');
            }
    }

    public function editpelanggan($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title']= "Form Edit Pelanggan";
        $data['data_pelanggan'] = $this->pelanggans->getpelangganbyid($id);
        $this->form_validation->set_rules('namapelanggan','Nama Pelanggan','required|trim');
        $this->form_validation->set_rules('nohp','No Handphone','required|numeric|trim');

        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('pelanggan/edit_pelanggan');
            $this->load->view('templates/footer');
        } else 
        {

            $data = array(
                'nama_pelanggan' => $this->input->post('namapelanggan'),
                'no_hp' => $this->input->post('nohp')
            );
            $idpelanggan = $this->input->post('idpelanggan');
            $this->pelanggans->updatepelanggan($data,$idpelanggan);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data pelanggan berhasil diubah !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('pelanggan');
        }

    }

    public function hapuspelanggan($id)
    {
        $this->pelanggans->hapuspelanggan($id);
        $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data pelanggan berhasil dihapus !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
        redirect('pelanggan');
    }
}