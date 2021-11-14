<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Mod_user', 'user');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User";
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['datauser'] = $this->user->getuser();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username', true);
            $data = [
                'username' => htmlspecialchars($username),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' =>  $this->input->post('role')
            ];
            $this->user->tambahuser($data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                            Data user berhasil ditambah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
            );
            redirect('user');
        }
    }

    public function getedituser()
    {
        echo json_encode($this->user->getuserbyid($this->input->post('id')));
    }

    public function edituser()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "User";
            $data['datauser'] = $this->user->getuser();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username', true);
            $data = [
                'username' => htmlspecialchars($username),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' =>  $this->input->post('role')
            ];
            $this->user->edituser($data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        Data user berhasil diubah !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
            );
            redirect('user');
        }
    }

    public function deleteuser($id)
    {
        $this->user->deleteuser($id);
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                Data user berhasil dihapus !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );
        redirect('user');
    }
}
