<?php
require 'koneksi tamu.php'
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Buku Tamu</title>
<meta charset="utf-8">
<meta name="viewport" content ="width=device-width,initial-scale=1">
<link rel="stylesheet" href="style/style.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<h2>Buku Tamu</h2>
<form method ="post" name = "frmpost" action = "tamu.php">
    <div class="form-group col-md-6">
      <label>Nama Tamu</label>
      <input type="text" class="form-control"  name = "namatamu" placeholder="Nama">
    </div>
  </div>
  <div class="form-group col-md-6">
    <label>Email</label>
    <input type="email" class="form-control" name ="emailtamu"  placeholder="Email">
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary" name="add">Submit</button>
</form>
</div>
</body>
<div class="card mb-4">
  <div class="card-body">
      <div class="table-responsive">
<table class = "table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Tamu</th>
      <th scope="col">Email</th>
      <th scope="col">Waktu</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $batas = 5;
				$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
				$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
				$previous = $halaman - 1;
				$next = $halaman + 1;
        $data = mysqli_query($connection,"select * from bukutamu");
				$jumlah_data = mysqli_num_rows($data);
				$total_halaman = ceil($jumlah_data / $batas);
    $ambilsemuadata = mysqli_query($connection,"select * from bukutamu limit $halaman_awal, $batas");
    $nomor = $halaman_awal+1;
      $i = 1;
    while($data= mysqli_fetch_array($ambilsemuadata)){
      $nama = $data ['Nama'];
      $email = $data ['email'];
      $time = $data ['Waktu'];
      $id = $data ['idtamu'];
    ?>
  <tr>
      <td><?=$i++;?></td>
      <td><?=$nama;?></td>
      <td><?=$email;?></td>
      <td><?=$time;?></td>
    </tr>
    <?php
  };

     ?>
     <nav>
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
				</li>
				<?php
				for($x=1;$x<=$total_halaman;$x++){
					?>
					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>
				<li class="page-item">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
				</li>
			</ul>
		</nav>
  </tbody>

</table>
</div>
</div>
</div>
</html>
