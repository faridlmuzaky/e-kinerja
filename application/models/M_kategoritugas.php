<?php
class M_kategoritugas extends CI_Model
{


    function jenis_tugas_list()
    {
        $this->db->select('*');
        $this->db->from('mst_jns_jobs');
        $jenis_tugas = $this->db->get();
        return $jenis_tugas;
    }

    function add_tugas($isi_tugas)
    {
        $this->db->insert('mst_jns_jobs', $isi_tugas);
    }

    function update_tugas($where, $isi, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $isi);
    }

    function delete_tugas($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
