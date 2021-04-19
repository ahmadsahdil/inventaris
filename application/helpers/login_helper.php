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
        $ci->session->set_flashdata(array(
            'msg'=> 'Anda belum login',
            'status'=> 'error'
        ));
        redirect('login');
    }
}


 
function generate_string($strength = 16) {
    $input= '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}

function admin()
{
    $ci = &get_instance();
    if ($ci->check_login->check()->status !== "Admin") {
        redirect('error');
    }
}

function admin_operator()
{
    $ci = &get_instance();
    if ($ci->check_login->check()->status == "Pelanggan") {
            redirect('error');
    }
}
 
