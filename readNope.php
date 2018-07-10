<?php
include ("koneksi.php");

function read_no($conn,$dbname,$nomor){
  $digawalnol=substr($nomor,0,1);
  $digawal=substr($nomor,1,1);
  $digInti=substr($nomor,1);
  $brpDig=strlen($digInti);

  if ($digawalnol == "0") {
    if ($digawal == "8") {
      $ambkode = mysqli_query($conn, "select * from parameter WHERE param1='nomor' and param3='$digawal'");
      while ($data=mysqli_fetch_array($ambkode)){
        $kode = $data[1];
        $negara = $data[3];
      }
    } else {
      $ambkode = mysqli_query($conn, "select * from parameter WHERE (param1='nomor' and param3='$digawal') and param4='$brpDig'");
      while ($data=mysqli_fetch_array($ambkode)){
        $kode = $data[1];
        $negara = $data[3];
      }
    }
    $nomorba=$kode.$digInti;
    //return $nomorba." dari negara ".$negara."<br>";
	   return $nomorba;
  } else {
    return "Maaf, nomor yang anda masukkan salah. Mohon ulangi";
  }
}
?>
