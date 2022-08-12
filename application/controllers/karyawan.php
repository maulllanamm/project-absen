<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama_pegawai') || $this->session->userdata('roles')=='admin'|| $this->session->userdata('role')=='manager') {
            redirect('auth');}

        $this->load->model(array('M_crud'));
        date_default_timezone_set('asia/jakarta');
    }

    public function index()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $this->load->view('karyawan/dashboard', $data);
    }

   
    public function kegiatan()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')],
        ['id_pegawai' => $this->session->userdata('nama_pegawai')]
    )
        ->row_array();
      
        $data['kegiatan'] = $this->M_crud->getkegiatan_karyawan($data['user']['id']);
        $this->load->view('karyawan/kegiatan', $data);
    }

    public function upload_kegiatan($id)
    {
   
         $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['tes'] = $this->db->get('tbl_pegawai')->result();
        $data['kegiatan']= $this->M_crud->uploadkegiatan($id);
        $this->load->view('karyawan/upload', $data);
        
    }

  
    function update_kegiatan(){
        $id=$this->input->post('id');
       
        $rincian=$this->input->post('rincian');
        $surat_keg=$this->input->post('surat');
        $status=2;

        $this->M_crud->upload_kegiatan($id,$rincian,$surat_keg,$status);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Kegiatan Berhasil upload silahkan tunggu konfirmasi dari admin </div>');
            redirect('karyawan/kegiatan');

    }
}
