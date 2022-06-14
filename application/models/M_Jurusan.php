<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_Jurusan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "tb_Jurusan";
        $this->uuid  = "id_Jurusan";
        $this->incmt = "incmt";
    }
    function gridata()
    {
        $this->db->select('
        a.id_Jurusan,
        a.kode_lembaga,
        a.kode_Jurusan,
        a.nm_Jurusan,
        b.nm_Lembaga,
        a.incmt
        ');
        $this->db->from("tb_Jurusan as a");
        $this->db->join('tb_Lembaga as b', 'b.kode_Lembaga = a.kode_Lembaga');
        $this->db->order_by("a.incmt", 'DESC');
        $this->db->group_by("a.kode_Jurusan");
        return  $this->db->get($this->table);
    }
    public function check_Jurusan($Jurusan)
    {
        $this->db->where('nm_Jurusan', $Jurusan);
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
        $this->db->where('id_Jurusan', $id);
        $query = $this->db->get($this->table)->num_rows();
        return $query;
    }
    public function getby_id($id)
    {
        $this->db->where('id_Jurusan', $id);
        $query = $this->db->get($this->table)->result();
        return $query;
    }
}
