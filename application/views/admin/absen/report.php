
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
             <img src="<?php echo config_item('assets'); ?>mt/media/logo/logonya.png" style="padding:0 0 0 10px;  float:left;  width: 40px;"> <center><p class="mb-0 font-weight-" style="font-size: 13px">LAPORAN PRESENSI <br>Jl.xxxx II No.2 Bogor, Telp (0251) 8341600 (Hunting)<br>email:  </p></center>
             <!--  <hr class="line-title mt-0"> -->
             </div>
            </div>
          <p id='tr' class="mb-0"><?php 
          $awal= $tgl_awal ;
          $akhir= $tgl_akhir ;
          $pegawai= $pegawai ;?>

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

               </p>



            <table class="border" border="1" style="width:100% ">
                <thead>
                <tr id="tr" class="font-weight-bold">
                      <td >No</td>
                      <td style="width: 45px">Nama Pegawai</td>
                      <td style="width: 70px">Bulan/Tahun</td>
                      <td>Jumlah Absen</td>      
                </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                      $jumlah=0;
                      $spaid=0;
                     foreach ($absen as $i) { 
                     ?>  
                    <tr id='tr' style="">
                      <td style="width: 30px"><?= $no?></td>
                      <td style="width: 145px"><?=strtolower(ucwords( $i->nama_pegawai));?></td>
                      <td style="width: 50px" ><?=date('m-Y', strtotime($i->tgl_absen )); ?></td>
                      
                      <td style="width: 45px">
                        <?=$i->jumlah_absen; ?>
                      </td>

                     
                    </tr>
                    <?php $no++; } ;
                    ?>
                    
            </table>
  </body>
  </div>
  </html>

