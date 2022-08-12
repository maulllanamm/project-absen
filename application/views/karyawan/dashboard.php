
<!DOCTYPE html>
<html lang="en">
<!-- base start -->
<?php $this->load->view('templates/base'); ?>

<?php 
    $day = array(
        '1' => 'Senin',
        '2' => 'Selasa',
        '3' => 'Rabu',
        '4' => 'Kamis',
        '5' => 'Jumat',
        '6' => 'Sabtu',
        '7' => 'Minggu',
    );
    
    $month = array(
        '01'=>'Jauary',
        '02'=>'February',
        '03'=>'Maret',
        '04'=>'April',
        '05'=>'Mei',
        '06'=>'Juni',
        '07'=>'Juli',
        '08'=>'Agustus',
        '09'=>'September',
        '10'=>'Oktober',
        '11'=>'November',
        '12'=>'Desember',
    );
    

    $bulan = date('m');
    $bulan = $month[$bulan];    

    $tanggal = date('d ').$bulan.date(' Y');

    $hari = date('N');
    $hari = $day[$hari];


$tgl_absen = date("Y-m-d");

$bulan = date('m');
$bulan = $month[$bulan];

$tanggal = date('d ') . $bulan . date(' Y');

$hari = date('N');
$hari = $day[$hari];


$karyawan = $this->session->userdata('nama_pegawai');
// $id = $this->session->userdata('id');
$id = $user['id'];

$getJam = date("H:i");


// cek apa udah absen atau belum
$check_absen_masuk = $this->db->query("SELECT * FROM tbl_absensi 
                                    WHERE id_pegawai = '$id' 
                                    and tgl_absen = '$tgl_absen'
                                    and keterangan = 'absen masuk'
                                    and status_absen = 1")->num_rows();

$check_absen_keluar = $this->db->query("SELECT * FROM tbl_absensi 
                                    WHERE id_pegawai = '$id' 
                                    and tgl_absen = '$tgl_absen'
                                    and keterangan = 'absen keluar'
                                    and status_absen = 1")->num_rows();


?>
<!-- base end -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


    <!-- header start -->
    <?php $this->load->view('templates/header'); ?>
    <!-- header end -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- aside start -->
            <?php $this->load->view('templates/assidek'); ?>
            <!-- aside end -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                <!-- begin:: Header -->
                <?php $this->load->view('templates/header2'); ?>
                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">
                                <h3 class="kt-subheader__title">
                                    Dashboard </h3>
                                <span class="kt-subheader__separator kt-hidden"></span>
                                <div class="kt-subheader__breadcrumbs">
                                    <a href="{{url('/dashboard')}}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="javascript:;" class="kt-subheader__breadcrumbs-link">
                                        Karyawan </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-container kt-grid__item kt-grid__item--fluid">
                        <div class="kt-portlet kt-portlet--mobile">
                            <div class="kt-portlet__head kt-portlet__head--lg">
                                <div class="kt-portlet__head-label">
                                    <i class="kt-font-brand flaticon2-time"></i>
                                    <h3 class="kt-portlet__head-title ml-3">
                                        PRESENSI
                                    </h3>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card shadow mb-2">
                                    <div class="card-body">
                                        <center>
                                            <!-- <img class="img-profile rounded-circle " style="width: 130px; margin-top: : 2px" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>"> -->
                                        </center>
                                        <center> <span class='badge badge-success'>Kasir</span></center>

                                        <hr class="mt-1">
                                        <div class="form-group" style="margin-bottom: 2px ">
                                            <span>Nama : </span>
                                            <input type="hidden" id="namaKaryawan" value="<?= $karyawan; ?>"><?= $karyawan; ?></input>

                                        </div>

                                        <div class="form-group" style="margin-bottom: 1px ">
                                            <span>Email &nbsp;: </span>

                                        </div>

                                        <div class="form-group" style="margin-bottom: 1px ">
                                            <span>Jabatan &nbsp;: </span>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="card shadow mb-2">
                                    <div class="card-body">
                                        <center>
                                            <!-- <img class="img-profile rounded-circle " style="width: 130px; margin-top: : 2px" src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>"> -->
                                        </center>
                                        <center> Absen <br>
                                            <h2 id="jam"></h2>
                                        </center>
                                        <?php date_default_timezone_set("Asia/Jakarta"); ?>

                                        <h1 class="text-center"><?= $hari, ', ', $tanggal; ?></h1>
                                        <div class="form-group text-center" style="margin-bottom: 2px ">
                                            <select name="ket_absen" class="form-control align-content-center my-2" id="ket_absen">
                                                <option value="Bekerja Di Kantor">Bekerja Di Kantor</option>
                                                <option value="Bekerja Di Rumah / WFH">Bekerja Di Rumah / WFH</option>
                                                <option value="Sakit">Sakit</option>
                                                <option value="Cuti">Cuti</option>
                                            </select>
                                            <div class="mt-2">
                                                <div id="func-absensi">
                                                    <p class="font-weight-bold">Status Kehadiran: <span class="badge badge-primary">Belum Absen</span></p>
                                                    <div id="jamabsen">
                                                        <input type="hidden" id="jamMasuk" value="<?= $jamMasuk; ?>">
                                                        <input type="hidden" id="id" value="<?= $id; ?>">
                                                        <input type="hidden" id="jamKeluar" value="<?= $jamKeluar; ?>">
                                                        <input type="hidden" id="batas_jam_masuk" value="<?= $batas_jam_masuk; ?>">
                                                        <p>Waktu Datang: <?= $jamMasuk; ?></p>
                                                        <p>Waktu Pulang: <?= $jamKeluar; ?></p>
                                                    </div>
                                                </div>
                                                <?php if ($getJam >= $jamMasuk && $getJam <= $batas_jam_masuk && $check_absen_masuk < 1) {; ?>
                                                    <button class="btn btn-dark" id="btn-absensi">Absen Masuk</button>
                                                <?php } else if ($getJam >= $jamKeluar && $check_absen_keluar < 1) {; ?>
                                                    <button class="btn btn-dark" id="btn-absensi">Absen keluar</button>
                                                <?php } else {; ?>
                                                    <button class="btn btn-dark" id="btn-absensi" disabled>Absen</button>
                                                <?php }; ?>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="text-muted">Absen Datang Jam: 08:00:00</div>
                                                <div class="text-muted">Absen Pulang Jam: 16:00:00</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <!-- begin:: Footer -->
            <!-- <?php $this->load->view('templates/footer'); ?> -->
            <!-- end:: Footer -->
        </div>
    </div>
    </div>
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <!-- begin:: script -->
    <!-- <?php $this->load->view('templates/script'); ?> -->
    <!-- end:: script -->
    <script>
        $(document).ready(function() {

        });

        timer();


        function timer() {
            var currentTime = new Date()
            var hours = currentTime.getHours()
            var minutes = currentTime.getMinutes()
            var sec = currentTime.getSeconds()
            if (minutes < 10) {
                minutes = "0" + minutes
            }
            if (sec < 10) {
                sec = "0" + sec
            }
            var t_str = hours + ":" + minutes + ":" + sec + " ";
            document.getElementById('jam').innerHTML = t_str;
            setTimeout(timer, 1000);
        }

  </script>

    </script>

    <script>
        $('#btn-absensi').on('click', function() {
            let currentTime = new Date()
            let hours = currentTime.getHours()
            let minutes = currentTime.getMinutes()
            let absen = hours + ":" + minutes

            let nama = $('#namaKaryawan').val();
            let id = $('#id').val();
            let jamMasuk = $('#jamMasuk').val();
            let jamKeluar = $('#jamKeluar').val();
            let batas_jam_masuk = $('#batas_jam_masuk').val();




            $.ajax({
                url: '<?php echo base_url('karyawan/save_absen'); ?>',
                type: 'POST',
                data: {
                    nama: nama,
                    id: id,
                    jamMasuk: jamMasuk,
                    jamKeluar: jamKeluar,
                    batas_jam_masuk: batas_jam_masuk,
                    absen: absen
                },
                success: function(html) {
                    document.write(html);
                    document.location.href = "<?= base_url('karyawan/index'); ?>";
                }
            })
        })
    </script>
>>>>>>> 05bca21583e6140bde4002a3c959b79f0e7859bb
</body>

</html>

<!-- <div class="container-fluid">
    <div class="my-4 d-sm-flex align-items-center justify-content-between">
        <h1>Dashboard</h1>
        <div class="btn btn-primary" id="sync-data-dashboard"><span class="fas fa-sync-alt mr-1"></span>Refresh Data</div>
    </div>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h4><span class="fas fa-user-tie mr-2"></span>Jumlah Pegawai</h4>
                    <h6 class="mt-3"><?= $jmlpegawai ?><div class="d-inline ml-1">Pegawai</div>
                    </h6>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url('datapegawai'); ?>">Lihat Selengkapnya</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <h4><span class="fas fa-user-clock mr-2"></span>Terlambat</h4>
                    <h6 class="mt-3"><?= $pegawaitelat ?><div class="d-inline ml-1">Pegawai
                        </div>
                    </h6>
                </div>
                <div class="card-footer small">
                    <div class="text-white">Data Hari Ini</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h4><span class="fas fa-user-check mr-2"></span>Hadir</h4>
                    <h6 class="mt-3"><?= $pegawaimasuk ?><div class="d-inline ml-1">Pegawai</div>
                    </h6>
                </div>
                <div class="card-footer small">
                    <div class="text-white">Data Hari Ini</div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body">
                    <h4><span class="fas fa-clock mr-2"></span>Hari Ini</h4>
                    <div id="date-and-clock mt-3">
                        <h5 id="clocknow"></h5>
                        <h5 id="datenow"></h5>
                    </div>
                    </h6>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="<?= base_url(''); ?>">Lihat Selengkapnya</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header"><span class="fas fa-user-clock mr-1"></span>Daftar Pegawai Terlambat [Hari Ini]
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dashboard" id="list-absensi-terlambat" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jam Masuk</th>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Jam Masuk</th>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header"><span class="fas fa-user-check mr-1"></span>Daftar Pegawai Hadir [Hari Ini]
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered dashboard" id="list-absensi-masuk" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Datang</th>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Waktu Datang</th>
                                    <th>Nama Pegawai</th>
                                    <th>Status</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->