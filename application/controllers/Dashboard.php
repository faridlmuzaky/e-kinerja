<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function index()
    {
        cek_not_login();
        $data['title'] = 'Dashboard';
        // $this->load->view('v_dashboard');
        $this->template->load('v_template', 'v_dashboard', $data);
    }
}
