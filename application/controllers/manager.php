<?php
defined('BASEPATH') or exit('No direct script access allowed');

class manager extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('nama_pegawai') || $this->session->userdata('roles')=='pegawai'|| $this->session->userdata('roles')=='admin') {
            redirect('auth');}

        $this->load->model(array('M_crud'));
        date_default_timezone_set('asia/jakarta');
        
        
    }

    public function index()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $this->load->view('manager/dashboard', $data);
    }

    
    public function kegiatan()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['kegiatan'] = $this->M_crud->getkegiatan();
       /* var_dump($data['kegiatan']);
        die();*/
        $this->load->view('manager/kegiatan/index', $data);
    }

    public function jadwal()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();

        $data['jadwal'] = $this->M_crud->getjadawal();
        $this->load->view('admin/jadwal/index', $data);
    }

     public function absen()
    {
        $data['user']= $this->db->get_where('tbl_pegawai',
        ['nama_pegawai' => $this->session->userdata('nama_pegawai')])
        ->row_array();
        $data['absen'] = $this->M_crud->getabsen();
        $this->load->view('manager/absen/index', $data);
    }


    public function save_pegawai()
    {
        
        $data  = array(
            'nama_pegawai'=> htmlspecialchars($this->input->post('pegawai', true)),
            'tempat'=> htmlspecialchars($this->input->post('tempat',true)),
            'tgl_lahir'=> htmlspecialchars($this->input->post('tgl_lahir',true)),
            'alamat'=> htmlspecialchars($this->input->post('email',true)),
            'email'=> htmlspecialchars($this->input->post('email',true)),
            /*'gambar'=>'default.jpg',*/
            'password'=> password_hash($this->input->post('password'),  
            PASSWORD_DEFAULT),
            'roles' => htmlspecialchars($this->input->post('roles',true)),
            'jk' => htmlspecialchars($this->input->post('jk',true)),
            
            'is_active' => 1,
            'created_at' => time()
        );
        $this->db->insert('tbl_pegawai',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
        karyawan Berhasi ditambahkan</div>');
        redirect('admin2/karyawan');
    }

     public function save_jadwal()
    {
        
        $data  = array(
            'jam_masuk'=>$this->input->post('jam_masuk', true),
            'jam_keluar'=> $this->input->post('jam_keluar',true),    
        );
        $this->db->insert('tbl_jadwal',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success outline" role="alert">
        Jadwal berhasi ditambahkan</div>');
        redirect('admin2/jadwal');
    }

     public function save_kegiatan()
    {
        $data  = array(
            'nama_kegiatan'=>$this->input->post('nama_kegiatan'),
            'id_pegawai'=> $this->input->post('pegawai'), 
           'start_date'=>($this->input->post('start_date')),
            'end_date'=> $this->input->post('start_date'), 
        );
        $this->M_crud->insert_kegiatan($data);
        $this->session->set_flashdata('message','<div class="alert alert-success outline" role="alert">
        Jadwal berhasi ditambahkan</div>');
        redirect('admin2/kegiatan');
    }

     public function delete_peg($id)
    {
   
    $this->M_crud->delete_pegawai($id);   
     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus  <button type="button" class="close" data-dismiss="alert" aria-label="Close"></div>');
        redirect('admin2/karyawan');
        
    }
}
