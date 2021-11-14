<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mod_auth','auth');
    }

    public function index()
    {
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');

        if($this->form_validation->run() == false){
            $data['title'] = "Login Page";
            $this->load->view('auth/login',$data);
        } else{
            //jika berhasil tervalidasi
            $this->login();
        }

    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->auth->getuser($username);

        //cek apakah ada user.
        if($user){
            //cek password
            if(password_verify($password,$user['password']))
            {
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['id_role']
                ];
                $this->session->set_userdata($data);
                //cek role nya
                    if($user['id_role'] == 1)
                    {
                        $this->session->set_flashdata('message', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Welcome !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                        redirect('admin');
                    } else
                    {
                        redirect('user');
                    }
            } else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth');
            }
        } else
         {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar!</div>');
                redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been log out !</div>');
                redirect('auth');
    }
}
