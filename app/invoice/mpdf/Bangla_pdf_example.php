<?php
include("mpdf.php");
$mpdf=new mPDF('','A4',14,'nikosh'); 
$mpdf->WriteHTML('');

$txt="This tutorial is made by \n নামঃ মোঃ আরিফুল ইসলাম \n ইমেইলঃ arifu_hstu07 [at] yahoo.com \n ";
$mpdf->MultiCell(100,10,$txt,1,'L',0); 
$mpdf->Output('');
exit;
?>