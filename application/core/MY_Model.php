<?php

class MY_Model extends CI_Model
{

    public $table;
    public $table_detail;
    public $prefix_id; //prefix id table adalah kode
    public $prefix_id_detail;

    /* mendapatkan semua data dan hasilnya sebuah array */

    public function getprefix()
    {
        return $this->prefix_id;
    }
    public function getprefixdetail()
    {
        return $this->prefix_id_detail;
    }

    public function getAll()
    {

        return $this->db->get($this->table)->result_array();
    }

    public function getAlllimit($limit)
    {

        $this->db->limit($limit);
        return $this->db->get($this->table)->row();
    }

    function checkData($field, $fieldwhere)
    {

        $this->db->where($field, $fieldwhere);
        $result = $this->db->get($this->table)->num_rows();
        return $result;
    }

    function checkDatadetail($field1, $fieldwhere1, $field2, $fieldwhere2)
    {

        $this->db->where($field1, $fieldwhere1);
        $this->db->where($field2, $fieldwhere2);
        $result = $this->db->get($this->table_detail)->num_rows();
        return $result;
    }

    function checkDatatwoparam($field1, $fieldwhere1, $field2, $fieldwhere2)
    {

        $this->db->where($field1, $fieldwhere1);
        $this->db->where($field2, $fieldwhere2);
        $result = $this->db->get($this->table)->num_rows();
        return $result;
    }

    function getGridData()
    {
        $query = "
                 SELECT a.*                        
                 FROM $this->table a   
                
                 ";
        return $this->db->query($query);
    }

    function insert($record)
    {
        $this->db->insert($this->table, $record);
    }

    function insert_detail($record)
    {
        $this->db->insert($this->table_detail, $record);
    }

    function getby_id($id)
    {
        $this->db->where($this->prefix_id, $id);
        return $this->db->get($this->table);
    }

    function getby_id_detail($id)
    {
        $this->db->where($this->prefix_id_detail, $id);
        return $this->db->get($this->table_detail);
    }

    function getby_name($field, $fieldwhere)
    {

        $this->db->where("$field", $fieldwhere);
        return $this->db->get($this->table);
    }

    function update($id, $record)
    {

        $this->db->where($this->prefix_id, $id);
        $this->db->update($this->table, $record);
    }

    function update_detail($id, $record)
    {

        $this->db->where($this->prefix_id_detail, $id);
        $this->db->update($this->table_detail, $record);
    }

    function delete($id)
    {
        $this->db->delete(
            $this->table,
            array($this->prefix_id => $id)
        );
    }
    function delete_detail($id)
    {
        $this->db->delete(
            $this->table_detail,
            array($this->prefix_id_detail => $id)
        );
    }
}
