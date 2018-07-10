<?php
require 'koneksi.php';
require 'readNope.php';

$out=[];
if(!isset($_POST['no'])){ // error
  $out=['status'=>'invalid_request'];
} else { // tidak error
  $readNo = read_no($_POST['no']);
  // $out=$readNo;
  // if(is_null($readNo['warning'])){
    $out=[
      'status'=>'valid_request',
      'warning'=>$readNo['warning'],
      'nomor'=>$readNo['nomor'],
      'negara'=>$readNo['negara'],
    ];
  // }else{
  //   $out=['warning'=>$readNo['warning']];
  // }
}
echo json_encode($out);
?>
