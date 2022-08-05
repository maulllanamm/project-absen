<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jadwal extends CI_Controller
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
        //$data = [
        // 'title' => 'Data Pegawai',
        // 'jadwal' => $this->m_jadwal->getjadawal()
        //];

        $data['jadwal'] = $this->M_crud->getjadawal();

        //var_dump($data);
        //die;

        $this->load->view('admin/jadwal/index', $data);
    }

    public function save()
    {
        $jam_masuk = $this->input->post('jam_masuk');
        $jam_keluar = $this->input->post('jam_keluar');

        $data  = array(
            'jam_masuk' => $jam_masuk,
            'jam_keluar' => $jam_keluar
        );
        $this->db->insert('tbl_jadwal', $data);
        redirect('jadwal');
    }
}
