<?php
defined('BASEPATH') or exit('No direct script access allowed');

class karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
<<<<<<< HEAD
        if (!$this->session->userdata('nama_pegawai') || $this->session->userdata('roles')=='admin'|| $this->session->userdata('role')=='manager') {
            redirect('auth');}
=======
        if (!$this->session->userdata('nama_pegawai') || $this->session->userdata('roles') == 'admin' || $this->session->userdata('role') == 'manager') {
            redirect('auth');
        }
>>>>>>> 05bca21583e6140bde4002a3c959b79f0e7859bb

        $this->load->model(array('M_crud'));
        date_default_timezone_set('asia/jakarta');
    }

    public function index()
    {
<<<<<<< HEAD
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

=======
        //get data jam masuk dan keluar
        $jam = $this->db->query("SELECT jam_masuk, jam_keluar, batas_jam_masuk FROM tbl_jadwal")->row_array();
        $data['jamMasuk'] = $jam['jam_masuk'];
        $data['batas_jam_masuk'] = $jam['batas_jam_masuk'];
        $data['jamKeluar'] = $jam['jam_keluar'];


        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')]
        )
            ->row_array();
        $this->load->view('karyawan/dashboard', $data);
    }


    public function kegiatan()
    {
        $data['user'] = $this->db->get_where(
            'tbl_pegawai',
            ['nama_pegawai' => $this->session->userdata('nama_pegawai')]
        )
            ->row_array();
        $data['pegawai'] = $this->M_crud->getpegawai();
        $data['kegiatan'] = $this->M_crud->getkegiatan();
        $this->load->view('karyawan/kegiatan/index', $data);
    }


    public function save_kegiatan()
    {
        $data  = array(
            'nama_kegiatan' => $this->input->post('nama_kegiatan'),
            'id_pegawai' => $this->input->post('pegawai'),
            'start_date' => ($this->input->post('start_date')),
            'end_date' => $this->input->post('start_date'),
        );
        $this->M_crud->insert_kegiatan($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success outline" role="alert">
        Jadwal berhasi ditambahkan</div>');
        redirect('admin2/kegiatan');
    }


    function update_kegiatan()
    {
        $id = $this->input->post('id');
        $id_pegawai = $this->input->post('nama_pegawai');
        $nama_kegiatan = $this->input->post('nama_kegiatan');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $this->M_crud->update_kegiatan($id, $id_pegawai, $nama_kegiatan, $start_date, $end_date);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil diubah </div>');
        redirect('admin2/kegiatan');
    }


    function save_absen()
    {
        $nama = $this->input->post('nama');
        $id = $this->input->post('id');
        $jamMasuk = $this->input->post('jamMasuk');
        $jamKeluar = $this->input->post('jamKeluar');
        $batas_jam_masuk = $this->input->post('batas_jam_masuk');
        $absen = $this->input->post('absen');

        if ($absen >= $jamMasuk && $absen <= $batas_jam_masuk) {
            $keterangan = 'absen masuk';
            $status = '1';
        } else if ($absen > $batas_jam_masuk && $absen < $jamKeluar) {
            $keterangan = 'absen masuk';
            $status = '0';
        } else {
            $keterangan = 'absen keluar';
            $status = '1';
        }

        $data = [
            'id_pegawai' => $id,
            'id_jadwal' => 9,
            'tgl_absen' => date('Y-m-d'),
            'keterangan' => $keterangan,
            'status_absen' => $status,
        ];
        $this->db->insert('tbl_absensi', $data);
>>>>>>> 05bca21583e6140bde4002a3c959b79f0e7859bb
    }
}
