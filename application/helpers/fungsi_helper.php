<?php
function cek_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user');
    if ($user_session) {
        redirect('Dashboard');
    }
}
function cek_not_login()
{
    $ci = &get_instance();
    $user_session = $ci->session->userdata('user');
    if (!$user_session) {
        redirect('Auth');
    }
}
