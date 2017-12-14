<?php 
	// header('Content-disposition: attachment; filename=Momenta.apk');
 //   	header('Content-type: APK');
 //    readfile('./upload/app/Momenta.apk');


$file_path='../upload/app/Momenta.apk';
$file_name='Momenta.apk';

    header('Content-Type: application/vnd.android.package-archive');
header("Content-length: " . filesize($file_path));
header('Content-Disposition: attachment; filename="' . $file_name . '"');
ob_end_flush();
readfile($file_path);
return true;





//     $file = './upload/app/Momenta.apk'; //not public folder
// if (file_exists($file)) {
//     header('Content-Description: File Transfer');
//     header('Content-Type: apk');
//     header('Content-Disposition: attachment; filename='.basename($file));
//     header('Content-Transfer-Encoding: binary');
//     header('Expires: 0');
//     header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
//     header('Pragma: public');
//     header('Content-Length: ' . filesize($file));
//     ob_clean();
//     flush();
//     readfile($file);
//     exit;
// }

 ?>