<?php
class M_user extends CI_Model
{

    function login($post)
    {

        $this->db->select();
        $this->db->from('t_user');
        $this->db->where('username', $post['username']);
        $hasil = $this->db->get()->row_array();

        if ($hasil) {
            if ($hasil['is_active'] == 1) {
                if (sha1($post['password']) == $hasil['password']) {
                    return $hasil;
                } else {
                    $hasil['data'] = "password salah";
                    return $hasil;
                }
            } else {
                $hasil['data'] = "user tidak aktif";
                return $hasil;
            }
        } else {
            $hasil['data'] = "user kosong";
            return $hasil;
        }
    }

    function  ambil($id = null)
    {
        $this->db->select('*');
        $this->db->from('t_user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $data = $this->db->get();
        return $data;
    }
}
