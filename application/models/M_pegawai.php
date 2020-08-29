<?php
class M_pegawai extends CI_Model
{

    function pegawai_list()
    {
        $hasil = $this->db->query("SELECT * FROM t_pegawai");
        return $hasil->result();
    }
}
