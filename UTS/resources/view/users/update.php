<?php
	$users = json_decode($user->read($id));
	if(count($users) > 0){
		foreach ($users as $key => $value) {
			$id_user = $value->id;
			$first_name = $value->attribute->first_name;
			$last_name = $value->attribute->last_name;
			$username = $value->attribute->username;
			$email = $value->attribute->email;
		}
	}else{
		$id_user = '';
		$first_name = '';
		$last_name = '';
		$username = '';
		$email = '';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data User</title>
	<style type="text/css">
  body {
    color: yellow;
    background-color: #1B7E00 }
  </style>
</head>
<body>
	<table>
		<form method="post">
			<tr>
				<td>Nama Depan</td>
				<td>:</td>
				<td><input type="text" name="first_name" value="<?= $first_name ?>"></td>
			</tr>
			<tr>
				<td>Nama Belakang</td>
				<td>:</td>
				<td><input type="text" name="last_name" value="<?= $last_name ?>"></td>
			</tr>
			<tr>
				<td>Username</td>
				<td>:</td>
				<td><input type="text" name="username" value="<?= $username ?>"></td>
			</tr>
			<tr>
				<td>email</td>
				<td>:</td>
				<td><input type="email" name="email" value="<?= $email ?>"></td>
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
			$result = $user->update($id_user, array(
			    'first_name' => $_POST['first_name'],
			    'last_name' => $_POST['last_name'],
			    'username' => $_POST['username'],
			    'email' => $_POST['email'],
			));
			if($result){
				?>
				<script type="text/javascript">
					alert('Data Berhasil di Update');
					window.location.href="index.php?home=users";
				</script>
				<?php
			}else{
				?>
				<script type="text/javascript">
					alert('Data Gagal di Update');
					window.location.href="index.php?home=users";
				</script>
				<?php
			}
		}
		?>
	</table>
</body>
</html>