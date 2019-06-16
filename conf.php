<?php
$site="http://forum.xbyte.id/";
$judul="X-Byte Forum";
$deskripsi="Unreserved Information";
date_default_timezone_set('Asia/Jakarta');
$tgl_waktu=date("r");
$konek=mysqli_connect("localhost", "root", "", "forum");
if(!$konek) {
    echo "Feature Maintance";
    exit;
}
?>
