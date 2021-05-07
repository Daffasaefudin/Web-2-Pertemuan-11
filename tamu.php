<?php
require 'koneksi tamu.php';

$nama = $_POST ['namatamu'];
$email = $_POST['emailtamu'];
$time=date("d M Y, H:i");
$query = mysqli_query($connection,"INSERT INTO bukutamu (Nama,email,Waktu)
values('$nama','$email','$time')");
$result = $query;
if($result){
echo "<h3 align=center>Proses penambahan Tamu berhasil</h3>";
echo "<A href=\"buku tamu.php\">List</A>";
}else{
echo "<h2 align=center>Proses penambahan Tamu tidak berhasil</h2>";
}

?>
