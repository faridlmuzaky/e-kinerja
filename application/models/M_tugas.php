<?php
class M_tugas extends CI_Model
{
    // start datatables
    var $table = 'mst_jobs';
    var $column_order = array(null, 'mst_jobs.id', 'mst_jns_jobs.jenis_jobs', 'mst_jobs.jobs', 'tbl_jabatan.nama_jabatan'); //set column field database for datatable orderable
    var $column_search = array('mst_jns_jobs.jenis_jobs', 'mst_jobs.jobs', 'tbl_jabatan.nama_jabatan'); //set column field database for datatable searchable
    var $order = array('id_jabatan' => 'asc'); // default order 

    function tugas_list()
    {
        // $hasil = $this->db->query("SELECT * FROM t_pegawai");
        // return $hasil->result();
        $this->db->select('mst_jobs.*, tbl_jabatan.nama_jabatan as nama_jabatan, mst_jns_jobs.jenis_jobs as jenis_jobs');
        $this->db->from('mst_jobs');
        $this->db->join('tbl_jabatan', 'mst_jobs.id_jabatan=tbl_jabatan.id_jabatan');
        $this->db->join('mst_jns_jobs', 'mst_jobs.id_jns_jobs=mst_jns_jobs.id');
        $hasil = $this->db->get();
        return $hasil;
    }
    function jabatan_list()
    {
        $this->db->select('*');
        $this->db->from('tbl_jabatan');
        $jabatan = $this->db->get();
        return $jabatan;
    }
    function jenis_tugas_list()
    {
        $this->db->select('*');
        $this->db->from('mst_jns_jobs');
        $jenis_tugas = $this->db->get();
        return $jenis_tugas;
    }

    function add_tugas($isi_tugas)
    {
        $this->db->insert('mst_jobs', $isi_tugas);
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

    // server side mulai dari sini 
    private function _get_datatables_query()
    {
        // $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name');
        // $this->db->from('p_item');
        // $this->db->join('p_category', 'p_item.category_id = p_category.category_id');
        // $this->db->join('p_unit', 'p_item.unit_id = p_unit.unit_id');
        $this->db->select('mst_jobs.*, tbl_jabatan.nama_jabatan as nama_jabatan, mst_jns_jobs.jenis_jobs as jenis_jobs');
        $this->db->from('mst_jobs');
        $this->db->join('tbl_jabatan', 'mst_jobs.id_jabatan=tbl_jabatan.id_jabatan');
        $this->db->join('mst_jns_jobs', 'mst_jobs.id_jns_jobs=mst_jns_jobs.id');

        $i = 0;
        foreach ($this->column_search as $item) { // loop column 
            if (@$_POST['search']['value']) { // if datatable send POST for search
                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all()
    {
        $this->db->from('mst_jobs');
        return $this->db->count_all_results();
    }
    // end datatables
}
