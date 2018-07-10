<?php
	include "koneksi.php";
	include "readNope.php";

	$username = strtolower($_GET['username']);
	$sql	= "select nomor,nama_dpn,nama_blk,gambar,kodeNeg FROM orderlink WHERE username='$username' LIMIT 1";
  $qry 	= mysqli_query($conn,$sql);

	// while ($data=mysqli_fetch_row($qry)){
		// $nope=$data[0];
		// $nama=$data[1]." ".$data[2];
		// $foto=$data[3];
		// $kode=$data[4];
	// }
	// echo $nope;

	$data=mysqli_fetch_row($qry);
		$nope=$data['nomor'];
		$nama=$data['nama_dpn']." ".$data['nama_blk'];
		$foto=$data['gambar'];
		$kode=$data['kodeNeg'];
		// print_r($data);exit();
	// $nopeba=substr(read_no($conn,$dbname,$nope),1);
	// $nopeba=$kode.substr($nope,1);
	// print_r($kode);exit();
	// $nopeba=$kode.substr($nope,1);
	//echo $nopeba;

	// $hostUrl='localhost';
	$hostUrl='http://hatiku-umrah.com/wa/';
?>
<html>
<head>
	<meta property="og:title" content="<?php echo $nama?>" />
	<meta property="og:description" content="<?php echo $nope?>" />
	<meta name="og:image" content="<?php echo $hostUrl.$foto; ?>" />
	<!-- <meta name="og:image" content="http://hatiku-umrah.com/wa/<?php echo $foto; ?>" /> -->
	<meta http-equiv="refresh" content="2;url=https://wa.me/<?php echo $nopeba; ?>&text=Assalamualaikum">
	<!-- <meta http-equiv="refresh" content="2;url=https://api.whatsapp.com/send?phone=<?php echo $nopeba?>&text=Assalamualaikum"> -->
</head>
<body>
	<?php
	/*
	//error_reporting(0);

	include "koneksi.php";
	include "readNope.php";

	$username=strtolower($_GET['username']);
    $qry = mysqli_query($conn,"select nomor FROM orderlink WHERE username='$username'");

	while ($data=mysqli_fetch_row($qry)){
		$nope=$data[0];
	}
	//echo $nope;

	$nopeba=substr(read_no($conn,$dbname,$nope),1);
	//echo $nopeba;

	header("Location: https://api.whatsapp.com/send?phone=$nopeba&text=Assalamualaikum");
*/
	?>
</body>
</html>
