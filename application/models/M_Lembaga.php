<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Lembaga extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "tb_Lembaga";
        $this->uuid  = "id_Lembaga";
        $this->incmt = "incmt";
    }
    function gridata()
    {
        $this->db->order_by($this->incmt, 'DESC');
        return  $this->db->get($this->table);
    }
    public function check_Lembaga($Lembaga)
    {
        $this->db->where('nm_Lembaga', $Lembaga);
        $query = $this->db->get($this->table)->num_rows();
        return $query;
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
    public function update($id, $data)
    {
        $this->db->where($this->uuid, $id);
        $this->db->update($this->table, $data);
    }


    function delete($id)
    {
        $this->db->delete($this->table, array($this->uuid => $id));
    }
    public function check_id($id)
    {
        $this->db->where('id_Lembaga', $id);
        $query = $this->db->get($this->table)->num_rows();
        return $query;
    }
    public function getby_id($id)
    {
        $this->db->where('id_Lembaga', $id);
        $query = $this->db->get($this->table)->result();
        return $query;
    }
}
