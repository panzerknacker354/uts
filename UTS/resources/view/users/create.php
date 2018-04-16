<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data User</title>
	<style type="text/css">
  body {
    color: purple;
    background-color: #1B7E00 }
  </style>
</head>
<body>
	<table>
		<form method="post">
			<tr>
				<td>Nama Depan</td>
				<td>:</td>
				<td><input type="text" name="first_name"></td>
			</tr>
			<tr>
				<td>Nama Belakang</td>
				<td>:</td>
				<td><input type="text" name="last_name"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>email</td>
				<td>:</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td>
					<a href="index.php?home=users">Cancel</a>
					<input type="submit" value="Simpan">
				</td>
			</tr>
		</form>
		<?php 
		
		if($_POST){
			$result = $user->add(array(
			    'first_name' => $_POST['first_name'],
			    'last_name' => $_POST['last_name'],
			    'username' => $_POST['username'],
			    'email' => $_POST['email'],
			    'password' => md5($_POST['password']),
			));
			if($result){
				?>
				<script type="text/javascript">
					alert('Data Berhasil di Simpan');
					window.location.href="index.php?home=users";
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
					alert('Data Gagal di Simpan');
					window.location.href="index.php?home=users";
				</script>
				<?php
			}
		}
		?>
	</table>
</body>
</html>