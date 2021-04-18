<?php 
	// menghubungkan dg functions.php utk bisa menjalankan query() 
	require 'functions.php';
	$mahasiswa = query("SELECT * FROM mahasiswa");
	if (isset($_POST["cari"])) {
		$mahasiswa = cari($_POST["keyword"]);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
</head>
<body>
	<h1>Daftaphpr Mahasiswa</h1>
	<a href="tambah.php">Tambah data mahasiswa</a>
	<br>
	<br>
	<form action="" method="post">
		<input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
		<button type="submit" name="cari">Cari</button>
	</form>
	<br>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
			<th>Gambar</th>
			<th>NIM</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>
		<?php $i=1; ?>
		<?php foreach ($mahasiswa as $mhs) { ?>
		<tr>
			<td><?= $i++; ?></td>
			<td>
				<a href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a> |
				<a href="hapus.php?id=<?= $mhs["id"]; ?>" onclick ="return confirm('Yakin?');">Hapus</a>
			</td>
			<td><img src="img/<?= $mhs["gambar"];  ?>"></td>
			<td><?= $mhs["nim"]; ?></td>
			<td><?= $mhs["nama"]; ?></td>
			<td><?= $mhs["email"]; ?></td>
			<td><?= $mhs["jurusan"] ?></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>
