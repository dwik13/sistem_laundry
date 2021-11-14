<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mod_transaksi', 'transaksi');
    }

    public function index()
    {
        $this->form_validation->set_rules('');
        $data['title'] = "Data Transaksi";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['datatransaksi'] = $this->transaksi->gettransaksi();
        $this->load->view('templates/header',$data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar',$data);
        $this->load->view('transaksi/index',$data);
        $this->load->view('templates/footer');
    }

    public function tambahtransaksi()
    {
        
        $data['title'] = "Data Transaksi";
        $data['paket'] = $this->transaksi->getpaket();
        $data['pelanggan'] = $this->transaksi->getpelanggan();
        $m = $this->transaksi->getmaxtrans();
            if($m == null)
            {
                $data['maxtrans'] = 1;
            }else{
                $data['maxtrans'] = $m['maxtrans']+1;
            }
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('pelanggan','Nama Pelanggan', 'required');
        $this->form_validation->set_rules('paket','Paket', 'required');
        $this->form_validation->set_rules('jumlah','Jumlah/berat', 'required|trim|numeric');
            if($this->form_validation->run() == false)
            {
                $this->load->view('templates/header',$data);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar',$data);
                $this->load->view('transaksi/tambah_transaksi',$data);
                $this->load->view('templates/footer');
            }else
            {
                $x = $this->transaksi->getmaxtrans();
                if($x == null)
                {
                    $idtrans = 1;
                }else{
                    $idtrans = $x['maxtrans']+1;
                }

            $tglmasuk = date("Y-m-d");
            $id = $this->input->post('paket');
            $pengerjaan = $this->transaksi->getpaketselesai($id);
            $selesai = implode("",$pengerjaan);
            $tglselesai = date('Y-m-d', strtotime("+$selesai day", strtotime($tglmasuk)));
            $status = 1;
            $tgl_transaksi = date("Y-m-d");
            $catatan = $this->input->post('catatan');
            $data = array(
                'id_transaksi' => $idtrans,
                'id_pelanggan' => $this->input->post('pelanggan'),
                'tgl_masuk' => $tglmasuk,
                'tgl_selesai' => $tglselesai,
                'status' => $status,
                'tgl_transaksi' => $tgl_transaksi,
                'catatan' => $catatan
            );
            
            $idtransaksi = $this->transaksi->simpantransaksi($data);
            $harga = $this->transaksi->getberatpaket($id);

            $hargasatuan = implode("",$harga);
            $berat = $this->input->post('jumlah');
            $totalberat = $berat * $hargasatuan;
            $data2 = array(
                'id_transaksi' => $idtransaksi,
                'id_paket' => $id,
                'jumlah' => $berat,
                'total' => $totalberat
            );
            $this->transaksi->simpandetail($data2);
            
                $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data transaksi berhasil ditambah !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('transaksi');
            }
            
    }


    public function detailtransaksi($id)
    {
        $data['title'] = "Data Transaksi";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['datatransaksi'] = $this->transaksi->gettransaksibyid($id);
        $data['transaksidet'] = $this->transaksi->getdetailpaket($id);
        $data['totaltrans'] = $this->transaksi->gettotaltrans($id);
        $ambilstat = $this->transaksi->gettransaksibyid($id);
        $stat = $ambilstat['status'];
        $this->form_validation->set_rules('status','Status','required');
        if($this->form_validation->run()==false){
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar',$data);
            $this->load->view('transaksi/detail_transaksi',$data);
            $this->load->view('templates/footer');
        }else{
            $data = $this->input->post('status');   
            $this->transaksi->updatedetail($id,$data);
            $this->session->set_flashdata('message', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data transaksi berhasil di ubah !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('transaksi');
        }
    }

    public function hapustransaksi($id){
        $this->transaksi->hapustransaksi($id);
        $this->session->set_flashdata('message', 
        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data transaksi berhasil di hapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>');
        redirect('transaksi');
    }
    

}