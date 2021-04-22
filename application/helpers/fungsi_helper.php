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
        redirect(base_url());
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
    if ($ci->check_login->check()->status == "Korlap") {
            redirect('error');
    }
}
 

function activity_log($aksi, $keyword)
{
    $CI = &get_instance();
    if ($CI->agent->is_browser()) {
        $agent = $CI->agent->browser();
    } elseif ($CI->agent->is_mobile()) {
        $agent = $CI->agent->mobile();
    }
    $param = array(
        'username' => $CI->db->escape_str(xss_clean(addslashes(htmlspecialchars($CI->session->userdata('_username'))))),
        'aksi' => $CI->db->escape_str(xss_clean(addslashes(htmlspecialchars($aksi)))),
        'keyword' => $CI->db->escape_str(xss_clean(addslashes(htmlspecialchars($keyword)))),
        'browser' => $CI->db->escape_str(xss_clean(addslashes(htmlspecialchars($agent)))),
        'os' => $CI->db->escape_str($CI->agent->platform()),
        'tanggal' => date('Y-m-d H:i:sa', time()),
    );
    //load model log
    $CI->load->model('log_model');
    //save to database
    $CI->log_model->add($param);
}

function delete_log()
{
    $CI = &get_instance();
    //load model log
    $CI->load->model('log_model');
    //save to database
    $CI->log_model->delete();
}
