<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategoritugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_kategoritugas');
    }
    public function index()
    {
        cek_not_login();
        $data['title'] = 'Kategori Tugas';
        $data['jenis_tugas'] = $this->M_kategoritugas->jenis_tugas_list()->result_array();
        $this->template->load('v_template', 'kategoritugas/index', $data);
    }

    public function data_tugas()
    {
        $data = $this->M_kategoritugas->tugas_list();
        echo json_encode($data);
        // var_dump($data);
    }

    function tambah_data_tugas()
    {

        $jns_jobs = $this->input->post('jenis_tugas');

        $isi_data = array(
            'jenis_jobs' => $jns_jobs,
        );
        $this->M_kategoritugas->add_tugas($isi_data);

        $this->session->set_flashdata('pesan', 'Tambah');

        //var_dump($this->session->flashdata('pesan'));
        redirect('kategoritugas');
    }
    function ubah_data_tugas()
    {
        $id = $this->input->post('idubah');
        // $id_jabatan = $this->input->post('id_jabatan');
        $jns_jobs = $this->input->post('ubah_jenis_tugas');
        // $uraian = $this->input->post('uraian');
        $isi_data = array(
            'jenis_jobs' => $jns_jobs
        );

        $where = array(
            'id' => $id
        );

        $this->M_kategoritugas->update_tugas($where, $isi_data, 'mst_jns_jobs');

        $this->session->set_flashdata('pesan', 'Ubah');
        redirect('kategoritugas');
    }

    function hapus_data_tugas()
    {
        $id = $this->input->post('idhapus');
        $where = array(
            'id' => $id
        );

        $this->M_kategoritugas->delete_tugas($where, 'mst_jns_jobs');
        $this->session->set_flashdata('pesan', 'Hapus');
        redirect('kategoritugas');
    }
}
