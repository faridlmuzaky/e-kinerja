<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_user');
    }

    public function index()
    {
        cek_login();
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('v_login');
        } else {
            $this->_proses();
        }
    }

    private function _proses()
    {
        // $data['user'] = $this->input->post('username');
        // $data['password'] = $this->input->post('password');
        $post = $this->input->post(null, true);
        if (isset($post['login'])) {
            $query = $this->M_user->login($post);
            if ($query['data'] == "user kosong") {
                $this->session->set_flashdata('pesan', '       <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
                User tidak terdaftar
            </div>');
                redirect('Auth');
            } elseif ($query['data'] == "password salah") {
                $this->session->set_flashdata('pesan', '       <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
                Password Salah
            </div>');
                redirect('Auth');
            } elseif ($query['data'] == "user tidak aktif") {
                $this->session->set_flashdata('pesan', '       <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
                User tidak aktif
            </div>');
                redirect('Auth');
            } else {
                $data = [
                    'user' => $query['username'],
                    'nip' => $query['nip'],
                    'nama' => $query['nama'],
                    'foto' => $query['foto'],
                    'level' => $query['level'],
                    'user_id' => $query['user_id']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', 'Anda Berhasil Masuk');
                redirect('Dashboard');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('nip');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('foto');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('pesan', '       <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-info"></i> Terima kasih</h5>
                Anda telah keluar 
            </div>');
        redirect('Auth');
    }
}
