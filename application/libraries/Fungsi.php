<?php
class Fungsi
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
    }

    function user_login()
    {
        $this->ci->load->model('M_user');
        $userid = $this->ci->session->userdata('user_id');
        $user_data = $this->ci->M_user->ambil($userid)->row();
        return $user_data;
    }
}
