<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mod_paket', 'paket');
    }

    public function index ()
    {
        $data['title'] = "Data Paket";
        $data['datapaket'] = $this->paket->getpaket(); 
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('paket_laundry/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambahpaket()
    {
        $data['title'] = "Tambah Data Paket";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('namapaket','Nama Paket','required|trim');
        $this->form_validation->set_rules('harga','Harga Paket','required|trim|numeric');
        $this->form_validation->set_rules('pengerjaan','Waktu Pengerjaan','required|trim|numeric');
        if($this->form_validation->run() == false)
        {
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('paket_laundry/tambah_paket',$data);
            $this->load->view('templates/footer');
        } else
        {
            $data = array(
                'nama_paket' => $this->input->post('namapaket'),
                'harga_satuan' => $this->input->post('harga'),
                'pengerjaan' => $this->input->post('pengerjaan')
            );
            $this->paket->tambahpaket($data);
            $this->session->set_flashdata('message', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Data paket laundry berhasil ditambah !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect('paket');
        }
    }

    public function editpaket($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Tambah Data Paket";
        $data['data_paket'] = $this->paket->getpaketbyid($id);
        $this->form_validation->set_rules('namapaket','Nama Paket','required|trim');
        $this->form_validation->set_rules('harga','Harga Paket','required|trim|numeric');
        $this->form_validation->set_rules('pengerjaan','Waktu Pengerjaan','required|trim|numeric');
            if($this->form_validation->run()==false)
            {
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar',$data);
                $this->load->view('paket_laundry/edit_paket',$data);
                $this->load->view('templates/footer');
            }else
            {
                $data = array(
                    'nama_paket' => $this->input->post('namapaket'),
                    'harga_satuan' => $this->input->post('harga'),
                    'pengerjaan' => $this->input->post('pengerjaan')
                );
                $idpaket = $this->input->post('idpaket');
                $this->paket->updatepaket($data,$idpaket);
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data paket laundry berhasil diubah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('paket');
            }
    }

    public function hapuspaket($id)
    {
        $this->paket->hapuspaket($id);
        $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data paket laundry berhasil dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('paket');
    }
}