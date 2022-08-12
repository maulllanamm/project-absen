<?php
class M_crud extends CI_Model
{


    function getjadawal()
    {
        $sql = "SELECT *  FROM tbl_jadwal  ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }


    function getpegawai()
    {
        $sql = "SELECT *  FROM tbl_pegawai  ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }

    function getkegiatan()
    {
        $sql = "SELECT *  FROM tbl_kegiatan k
         JOIN tbl_pegawai p on k.id_pegawai=p.id

         ORDER BY k.id_pegawai ASC";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }


    function getabsen($tgl_awal=null, $tgl_akhir=null, $pegawai=null){
        if ($tgl_awal == null or $tgl_awal == "")  $tgl_awal = date('Y/m/d');
        if ($tgl_akhir == null or $tgl_akhir == "") $tgl_akhir = date('Y/m/d');

        if ($pegawai == null)  {
            
        
        $sql ="SELECT count(p.nama_pegawai) as jumlah_absen, p.nama_pegawai,a.tgl_absen, a.status_absen FROM tbl_absensi a JOIN tbl_pegawai p ON p.id = a.id_pegawai  AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY p.nama_pegawai ";
       
        } else {
            
            $sql = "SELECT count(p.nama_pegawai) as jumlah_absen,p.nama_pegawai, a.tgl_absen, a.status_absen  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' AND a.id_pegawai=$pegawai GROUP BY p.nama_pegawai";
        }
        //echo $querinya;
        //die();
        $q = $this->db->query($sql);
        return $q->result();     
    }

    function cetak_absen($tgl_awal=null, $tgl_akhir=null, $pegawai=null){
        if ($tgl_awal == null or $tgl_awal == "")  $tgl_awal = date('Y/m/d');
        if ($tgl_akhir == null or $tgl_akhir == "") $tgl_akhir = date('Y/m/d');

        if ($pegawai == null)  {
            
        
        $sql ="SELECT count(p.nama_pegawai) as jumlah_absen, p.nama_pegawai,a.tgl_absen, a.status_absen FROM tbl_absensi a JOIN tbl_pegawai p ON p.id = a.id_pegawai  AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY p.nama_pegawai ";
       
        } else {
            
            $sql = "SELECT count(p.nama_pegawai) as jumlah_absen,p.nama_pegawai, a.tgl_absen, a.status_absen  FROM tbl_absensi a
                JOIN tbl_pegawai p on p.id = a.id_pegawai AND a.tgl_absen BETWEEN '$tgl_awal' AND '$tgl_akhir' AND a.id_pegawai=$pegawai GROUP BY p.nama_pegawai";
        }
        //echo $querinya;
        //die();
        $q = $this->db->query($sql);
        return $q->result();     
    }


     public function sumpegawai(){
       $hasil=$this->db->select('*');
        $this->db->from('tbl_pegawai');   
        
        return $hasil->count_all_results();
    }

    public  function sumkegiatan()
    {
       $hasil=$this->db->select('*');
        $this->db->from('tbl_kegiatan');   
        $tgl=date('Y-m-d');
        $st= 'show';
        $this->db->where('start_date',$tgl);
        $this->db->where('status_kegiatan',$st);
        return $hasil->count_all_results();
    }

    public  function sumkegiatann()
    {
       $hasil=$this->db->select('*');
        $this->db->from('tbl_kegiatan');   
        $tgl=date('Y-m-d');
        $st= 'hide';
        $this->db->where('start_date',$tgl);
        $this->db->where('status_kegiatan',$st);
        return $hasil->count_all_results();
    }



//funciont/kegiatan karyawan
    public function getkegiatan_karyawan($index_data=NULL)
    {
       $hasil=$this->db->select('tbl_pegawai.*,
        tbl_kegiatan.id_kegiatan,
        tbl_kegiatan.nama_kegiatan,
        tbl_kegiatan.start_date,
        tbl_kegiatan.end_date,
        tbl_kegiatan.surat_kegiatan,
        tbl_kegiatan.rincian_kegiatan,
        tbl_kegiatan.nilai_kegiatan,
        tbl_kegiatan.status_kegiatan
        ');
        $this->db->join('tbl_kegiatan', 'tbl_kegiatan.id_pegawai=tbl_pegawai.id');
        $this->db->from('tbl_pegawai');
       
        if($index_data!=NULL){
        $this->db->where('tbl_kegiatan.id_pegawai',$index_data);
       /* $this->db->where('pesanan.status',$proses);
        $this->db->where('pesanan.tanggal',$tgl);*/

        $query = $this->db->get();
        return $query->result();
    }
    }

     public function uploadkegiatan($id){
        
         $q = $this->db->query("SELECT p.nama_pegawai,a.start_date,a.end_date,a.nama_kegiatan,a.id_kegiatan  FROM tbl_kegiatan a
        JOIN tbl_pegawai p on p.id = a.id_pegawai  where a.id_kegiatan=$id");
        return $q->result_array();   
    }


    function upload_kegiatan($id,$rincian,$surat_keg,$status){
       
         $data = array(
            'id_kegiatan'=>$id,
            'rincian_kegiatan' =>$rincian,
            'surat_kegiatan' =>$surat_keg,
            'status_kegiatan'=>$status
        );

       $this->db->where('id_kegiatan', $id);
       $this->db->update('tbl_kegiatan', $data);
    }



}

   
