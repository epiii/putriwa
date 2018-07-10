<?php
	//error_reporting(0);
	var_dump($_REQUEST);
	exit();

	include "koneksi.php";

	$namadpn=$_POST['namadpn'];
	$namablk=$_POST['namablk'];
	$no=$_POST['no'];
	$gambar=$_POST['gambar'];
	$negara=$_POST['negara'];

	$a=trim($namadpn," ");
	echo $namadpn." ".$namablk." ".$no." ".$negara." ".$a;
/*
	$fileName=$_FILES['gambar']['name'];
	$fileSize=$_FILES['gambar']['size'];
	$fileError=$_FILES['gambar']['error'];

	$username=strtolower($namadpn);
	$cekusername = mysqli_query($conn, "select * from orderlink where nama_dpn='$namadpn'");
	$tambah=mysqli_num_rows($cekusername);
	if ($tambah <= 0) {
		$userBaru=$username;
	} else {
		$userBaru=$username.$tambah;
	}

	$neg=substr($negara,1);

	if($fileSize > 0 || $fileError == 0){
	$move=move_uploaded_file($_FILES['gambar']['tmp_name'],'gambar/'.$fileName);

	$query=mysqli_query($conn, "insert into orderlink (nama_dpn,nama_blk,kodeNeg,nomor,username,gambar) values ('$namadpn','$namablk','$neg','$no','$userBaru','gambar/$fileName')");
	if($query){
		echo "
		<div class='pageLoader'></div>
		<br />

		<div class='container'>
			<div class='card'>
				<div class='card-body' style='text-align:center;'>
					<h2>Selamat, anda berhasil terdaftar</h2>
					<p>Dibawah ini adalah URL OrderLink anda</p>
					<p>http://hatiku-umrah.com/wa/username/".$userBaru."</p>
					<br>
					<sup>NBBB : URL akan berjalan dengan baik,</sup>
					<sup>bila dibuka dari browser Google Chrome</sup>
				</div>
			</div>
		</div>
		";
	}
	}else {
		echo "<script> alert('Foto Belum Dimasukkan');
		window.location='index.php'</script>";
	}
*/
?>
