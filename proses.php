<html>
	<head>
		<title> Registrasi Berhasil </title>
		<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	</head>
	<body>

<?php
	//error_reporting(0);
	// print_r($_FILES);
	// exit();
if (!isset($_POST['submit'])) {
	echo "invalid request, you can't access this file directly,you should submit via form, just once ";
} else {
	include "koneksi.php";

	$namadpn=$_POST['namadpn'];
	$namablk=$_POST['namablk'];
	$no			=$_POST['no'];
	$gambar	=$_POST['gambar'];
	$negara	=$_POST['negara'];
	$tipe		=$_POST['tipe'];
// var_dump($_POST);exit();
	// $a=trim($namadpn," ");
	// echo $namadpn." ".$namablk." ".$no." ".$negara." ".$a;
	//

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
		$sql = "insert into orderlink (nama_dpn,nama_blk,kodeNeg,nomor,username,gambar,tipe)
						values ('$namadpn','$namablk','$neg','$no','$userBaru','gambar/$fileName','$tipe')";
						// print_r($sql);exit();
		$query=mysqli_query($conn,$sql);

		if(!$query){
			echo mysqli_error($conn);
		} else {

		// offline testing
			$mainUrl 	= 'http://localhost/';
			$subUrl 	= 'putriwa/'; // wa/ atau putriwa/ (sesuaikan nama folder / project)

		// online testing
			// $hostUrl = 'http://hatiku-umrah.com/';
			// $subUrl = 'wa/';

		// full URL
			$url = $mainUrl.$subUrl.$userBaru;
			// <p><a target="_blank" href="http://hatiku-umrah.com/wa/'.$userBaru.'">http://hatiku-umrah.com/wa/'.$userBaru.'</a></p>

			echo '
				<div class="pageLoader"></div>
				<br />

				<div class="container">
					<div class="card">
						<div class="card-body" style="text-align:center;">
							<h2>Selamat, anda berhasil terdaftar</h2>
							<p>Dibawah ini adalah URL OrderLink anda</p>
							<p><a target="_blank" href="'.$url.'">'.$url.'</a></p>
							<br>
							<sup>NB : URL akan berjalan dengan baik,</sup>
							<sup>bila dibuka dari browser Google Chrome</sup>
						</div>
					</div>
				</div>
			';
		}
	}	else {
		echo "<script> alert('Foto Belum Dimasukkan');
		window.location='./'</script>";
		// window.location='index.php'</script>";
	}
}
?>
	</body>
</html>
