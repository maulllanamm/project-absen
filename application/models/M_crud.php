<?php
class M_crud extends CI_Model
{


    function getjadawal()
    {
        $sql = "SELECT *  FROM tbl_jadwal  ORDER BY id ASC";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }

    // get data dropdown
    function ListRuangan()
    {
        // ambil data dari db
        $this->db->order_by('NamaRuangan', 'asc');
        $this->db->WHERE('statusEnabled', '1');
        $this->db->WHERE_in('KdInstalasi', array('02', '07', '19', '01', '03', '09', '10', '04'));

        $result = $this->db->get('ruangan');
        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
                // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->KdRuangan] = $row->NamaRuangan;
            }
        }
        return $dd;
    }

    function AcakPassword($password)
    {
        $kata    = $password;
        $code = '1234567890';
        $cryp = '';
        for ($i = 1; $i <= strlen($kata); $i++) {
            $lok = ($i % strlen($code)) + 1;
            $cryp = $cryp . chr(ord(substr($kata, $i - 1, 1)) ^ ord(substr($code, $lok - 1, 1)));
        }
        return    $AcakPassword = $cryp;
    }

    function CekHakRuanganPegawai($IdPegawai, $KdRuangan)
    {
        $sql = "SELECT count(*) as Total from loginruangan where IdPegawai='$IdPegawai' and KdRuangan='$KdRuangan'";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }

    function CekJenisPegawai($IdPegawai)
    {
        $sql = "select KdJenisPegawai , `Jenis Pegawai` AS JenisPegawai from V_M_DataPegawaiNew WHERE IdPegawai ='$IdPegawai' ";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }

    function AmbilNamaRuangan($KdRuangan)
    {
        $sql = "Select NamaRuangan , KdInstalasi From Ruangan Where KdRuangan='$KdRuangan'";
        $query = $this->db->query($sql);
        return $result = $query->result();
    }
    function get_pegawai()
    {
        $data = $this->db->select('*')
            ->from('tbl_kegiatan a')
            ->join('tbl_pegawai b', 'a.id_pegawai=b.id', 'LEFT')
            ->get();
        return $data;
    }
    public function show2($table)
    {
        $sql = $this->db->get($table);
        return $sql;
    }
}
