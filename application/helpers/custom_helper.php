<?php


function ceklogin()
{
    $ci = &get_instance();
    if ($ci->session->userdata('ses_statuslogin')  != TRUE) {
        $ci->session->set_flashdata('gagal', 'Sesi Anda Habis, Silahkan Login Kembali');
        redirect('C_auth');
    }
}

function slug($string, $spaceRepl = "-")
{
    $string = str_replace("&", "and", $string);
    $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);
    $string = strtolower($string);
    $string = preg_replace("/[ ]+/", " ", $string);
    $string = str_replace(" ", $spaceRepl, $string);
    return $string;
}
function cekSess()
{
    $ci = &get_instance();
    if ($ci->session->userdata('ses_statuslogin') == true) {
        redirect(base_url());
    }
}

function cek_akses($role_id, $id_menu)
{
    $ci = &get_instance();
    $ci->db->where('role_id', $role_id);
    $ci->db->where('id_menu', $id_menu);
    $hasil = $ci->db->get('user_access_menu');
    if ($hasil->num_rows() > 0) {
        return  "Aktif";
    }
    return  "Non Aktif";
}


// membuat csrf token sendiri 
if (!function_exists("get_csrf_token")) {
    function get_csrf_token()
    {
        $ci = &get_instance();
        if (!$ci->session->csrf_token) {
            $ci->session->csrf_token = hash('sha1', "tedyzhu@gmail.com" . time());
        }
        return $ci->session->csrf_token;
    }
}

if (!function_exists("get_csrf_name")) {
    function get_csrf_name()
    {
        return "token";
    }
}
if (!function_exists("get_csrf_id")) {
    function get_csrf_id()
    {
        return "token";
    }
}

function add_csrf()
{
    return "
    <div style='display: none;' class='alert alert-danger alert-dismissable'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    <strong>Warning !</strong> &nbsp; Token Anda Salah, lakukan Refresh Untuk Halaman</div>
    <input type='hidden' class='form-control' name='" . get_csrf_name() . "' id='" . get_csrf_id() . "' value='" . get_csrf_token() . "' />
    ";
}
