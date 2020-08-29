<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pegawai');
    }

    public function index()
    {
        cek_not_login();
        $data['title'] = 'Pegawai';
        $this->template->load('v_template', 'pegawai/index', $data);
    }

    public function data_pegawai()
    {
        $data = $this->M_pegawai->pegawai_list();
        echo json_encode($data);
    }
}
