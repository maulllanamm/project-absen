<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model(array('M_crud'));
        date_default_timezone_set('asia/jakarta');
    }

    public function index()
    {

        date_default_timezone_set('asia/jakarta');
        $data['kegiatan'] = $this->M_crud->get_pegawai();

        $this->load->view('admin/kegiatan/index', $data);
    }

    public function save()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $rincian_kegiatan = $this->input->post('rincian_kegiatan');
        $status_kegiatan = $this->input->post('status_kegiatan');
        $nilai_kegiatan = $this->input->post('nilai_kegiatan');

        $data  = array(
            'id_pegawai' => $id_pegawai,
            'nama_kegiatan' => $nama_kegiatan,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'rincian_kegiatan' => $rincian_kegiatan,
            'status_kegiatan' => $status_kegiatan,
            'nilai_kegiatan' => $nilai_kegiatan
        );
        $this->db->insert('tbl_kegiatan', $data);
        redirect('Kegiatan');
    }
}
