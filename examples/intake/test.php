<?php
$file1 = 'n-400.pdf';
header('Content-type: application/pdf');
header('Content-Disposition: inline; filename="'.$file1.'"');
header('Content-Transfer-Encoding: binary');
header('Accept-Range: bytes');
@readfile($file1);
?>