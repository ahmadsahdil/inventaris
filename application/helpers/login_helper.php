<?php
function cek_already_login()
{
    $ci = &get_instance();
    $user = $ci->encryption->decrypt($ci->session->userdata('_user_id'));
    if ($ci->check_login->check()->id_user == $user) {
        redirect('admin');
    }
}

function cek_not_login()
{
    $ci = &get_instance();
    $user = $ci->encryption->decrypt($ci->session->userdata('_user_id'));
    if ($ci->check_login->check()->id_user !== $user) {
        $ci->session->set_flashdata('message', 'Anda belum login');
        redirect('login');
    }
}
