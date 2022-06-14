<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Pendaftaran extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "tb_lembaga";
        // $this->uuid  = "id_Pendaftaran";
        $this->kode  = "kode_lembaga";
        $this->incmt = "incmt";
    }
    function get_jurusan_byid($kode_lembaga)
    {
        $this->db->select('*');
        $this->db->from('tb_jurusan as a');
        $this->db->where('a.kode_lembaga', $kode_lembaga);
        return  $this->db->get()->result();
    }
}
