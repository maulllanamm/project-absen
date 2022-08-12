
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pagesit</title>
  <style type="text/css">
   .upper { text-transform: uppercase; }
   .lower { text-transform: lowercase; }
   .cap   { text-transform: capitalize; }
   .small { font-variant:   small-caps; }

  /* #page{
   size: 8.27in 11.69in;
   margin: .5in .5in .5in;
   mso-header-margin: .5in;
   mso-paper-sourch: 0;
   }*/
  table{
      border-collapse: collapse;
      width: 100%;
      margin: 0;
  }
  table th{
      border:1px solid #000;
      padding: 3px;
      font-weight: bold;
      text-align: center;
  }
  table td{
      border:1px solid #000;
      padding: 2px;
      vertical-align: top;
       padding: 2px;
  }

  #tr{
  font-size: 10px;
  text-transform: capitalize;
}
s{

  font-size: 8px;
}
</style>
</head>
<div class="container-fluid">
<body onload="window.print();">
 <div id="page">
            <div class="mt-2">
             <div >
             <img src="<?= base_url('assets/img/logo/umi.png') ?>" style="padding:0 0 0 10px;  float:left;  width: 122px;"> <p class="mb-0 font-weight-" style="font-size: 13px">LAPORAN PRESENSI <br>Jl.xxxx II No.2 Bogor, Telp (0251) 8341600 (Hunting)<br>email:  </p></center>
             <!--  <hr class="line-title mt-0"> -->
             </div>
            </div>
          <p id='tr' class="mb-0"><?php 
          $awal= $tgl_awal ;
          $akhir= $tgl_akhir ;
          ?>

              Laporan Tanggal :   <?php if ($awal == null ) { ?>
                        <?= date('d-m-Y') ?>
                      <?php }  
                       else { ?>
                        <span style="color: green; font-size: 13px">  <?=date('d-m-Y', strtotime($awal)); ?></span>
                      <?php  }?>

              S/d Tanggal : 
                 <?php if ($akhir == null ) { ?>
                     <?= date('d-m-Y') ?>
                      <?php } else { ?>
                      <span style="color: green; font-size: 13px">  <?=date('d-m-Y', strtotime($akhir)); ?></span>
                      <?php  }?>

              , Nama Karyawan: 
                      <!-- <?php if ($karyawan == null ) { ?>
                        <?= 'All'?>
                      <?php } else { ?>
                        
                          <span style="color: red; font-size: 13px"></span>
                         
                      <?php  }?> </p> -->



            <table class="border" border="1" style="width:100% ">
                <thead>
                <tr id="tr" class="font-weight-bold">
                      <td >No</td>
                      <td style="">Nama Pegawai</td>
                      <td style="">Tanggal Absen</td>
                      <td>Status Absen</td>
              
                </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                      $jumlah=0;
                      $spaid=0;
                     foreach ($absen as $i) { 
                     /*$jumlah= $jumlah+$i['total_tarif'];
                     $metode= $i['metode_bayar'];
                     $statusb/*= $i['statusbayar'];
                     $statusp= $i['status'];
                     $rm     = $i['rm'];*/
                     ?>  
                    <tr id='tr' style="">
                      <td style="width: 30px"><?= $no?></td>
                    

                      
                      <td style="width: 50px" ><?=date('d-m-Y', strtotime($i['tgl_absen'] )); ?></td>
                    
                      <td style="width: 90px"><?= $i['nama_pegawai']?></td>
                      <td style="width: 145px"><?=strtolower(ucwords( $i['status_absen'] ));?></td>
                      <!-- <td style="width: 45px"><?php
                       if ($metode == 1) { ?>
                       Cash
                      <?php } else  if ($metode == 3){ ?>
                       COD
                       <?php }?>
                      </td>  -->

                  
                    </tr>
                    <?php $no++; } ;
                    ?>
                    
            </table>
  </body>
  </div>
  </html>

