<?php
$users = json_decode($user->index());
?>
<!DOCTYPE html>
<html>
<head>
	<title>User</title>
	<style type="text/css">
  body {
    color: green;
    background-color: #d8da3d }
  </style>
</head>
<body>
	<a href="index.php?home=tambah_user">Tambah Data</a>
	<table width="100%" border="1">
		<thead>
			<td>#</td>
			<td>Nama Depan</td>
			<td>Nama Belakang</td>
			<td>Username</td>
			<td>Email</td>
			<td>Action</td>
		</thead>

		<tbody>
		<?php if(count($users) > 0){?>
			<?php $no = 1;?>
			<?php foreach($users as $key => $value){?>
			<tr>
				<td><?= $no++?></td>
				<td><?= $value->attribute->first_name?></td>
				<td><?= $value->attribute->last_name?></td>
				<td><?= $value->attribute->username?></td>
				<td><?= $value->attribute->email?></td>
				<td>	
					<a href="index.php?home=update_user&id=<?= $value->id?>">Edit</a>
					<a href="index.php?home=hapus_user&id=<?= $value->id?>" onClick="return confirm('yakin ingin menghapus data ini??')">Hapus</a>
				</td>
			</tr>
			<?php }?>
		<?php }?>
		</tbody>
	</table>
</body>
</html>