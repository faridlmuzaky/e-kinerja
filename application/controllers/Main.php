<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{


    public function index()
    {
        $data['title'] = "HR Dept";
        $this->load->view('templates/v_header.php', $data);
        $this->load->view('templates/v_navbar.php');
        $this->load->view('templates/v_sidebar.php');
        $this->load->view('templates/v_main.php');
        $this->load->view('templates/v_footer.php');
    }
}
