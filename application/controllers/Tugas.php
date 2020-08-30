<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_tugas');
    }
    public function index()
    {
        cek_not_login();
        $data['title'] = 'Uraian Tugas';
        // $this->load->view('v_dashboard');
        // $this->load->model('M_tugas');
        $data['isi'] = $this->M_tugas->tugas_list()->result_array();
        $data['jabatan'] = $this->M_tugas->jabatan_list()->result_array();
        $data['jenis_tugas'] = $this->M_tugas->jenis_tugas_list()->result_array();
        $this->template->load('v_template', 'tugas/index', $data);
    }

    public function data_tugas()
    {
        $data = $this->M_tugas->tugas_list();
        echo json_encode($data);
        // var_dump($data);
    }

    function tambah_data_tugas()
    {
        $id_jabatan = $this->input->post('id_jabatan');
        $id_jns_jobs = $this->input->post('id_jenis_tugas');
        $uraian = $this->input->post('uraian');
        $isi_data = array(
            'id_jns_jobs' => $id_jns_jobs,
            'jobs' => $uraian,
            'id_jabatan' => $id_jabatan
        );
        $this->M_tugas->add_tugas($isi_data);

        $this->session->set_flashdata('pesan', 'Tambah');

        //var_dump($this->session->flashdata('pesan'));
        redirect('tugas');
    }
    function ubah_data_tugas()
    {
        $id = $this->input->post('idubah');
        $id_jabatan = $this->input->post('id_jabatan');
        $id_jns_jobs = $this->input->post('id_jenis_tugas');
        $uraian = $this->input->post('uraian');
        $isi_data = array(
            'id_jns_jobs' => $id_jns_jobs,
            'jobs' => $uraian,
            'id_jabatan' => $id_jabatan
        );

        $where = array(
            'id' => $id
        );

        $this->M_tugas->update_tugas($where, $isi_data, 'mst_jobs');

        $this->session->set_flashdata('pesan', 'Ubah');
        redirect('tugas');
    }

    function hapus_data_tugas()
    {
        $id = $this->input->post('idhapus');
        $where = array(
            'id' => $id
        );

        $this->M_tugas->delete_tugas($where, 'mst_jobs');
        $this->session->set_flashdata('pesan', 'Hapus');
        redirect('tugas');
    }

    // server side mulai dari sini
    function get_ajax()
    {
        $list = $this->M_tugas->get_datatables();
        $data = array();
        // var_dump($list);
        // die;
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            // $row[] = $no . ".";
            // $row[] = $item->barcode . '<br><a href="' . site_url('item/barcode_qrcode/' . $item->item_id) . '" class="btn btn-default btn-xs">Generate <i class="fa fa-barcode"></i></a>';
            $row[] = $item->id;
            $row[] = $item->jenis_jobs;
            $row[] = $item->jobs;
            $row[] = $item->id_jabatan;
            $row[] = $item->nama_jabatan;
            // $row[] = $item->image != null ? '<img src="' . base_url('uploads/product/' . $item->image) . '" class="img" style="width:100px">' : null;
            // add html for action
            $row[] = '<a href="#" class="badge badge-warning" data-toggle="modal" data-target="#modalEdit' . $item->id . '"><i class="fa fa-pencil"></i> Ubah</a>
                    <a href="#"  class="badge badge-danger" data-toggle="modal" data-target="#modalHapus' . $item->id . '">Hapus</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->M_tugas->count_all(),
            "recordsFiltered" => $this->M_tugas->count_filtered(),
            "data" => $data,
        );
        // output to json format
        echo json_encode($output);
    }
}
