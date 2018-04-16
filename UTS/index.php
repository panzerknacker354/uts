<?php 
require_once('app/controllers/UserController.php');


//initialize Class to Object
$user = new UserController();

$home = @$_GET['home'];
$id = @$_GET['id'];

if($home == ''){

}else if($home == 'users'){
	include 'resources/view/users/index.php';
}else if($home == 'tambah_user'){
	include 'resources/view/users/create.php';
}else if($home == 'update_user'){
	include 'resources/view/users/update.php';
}else if($home == 'hapus_user'){
	$result = $user->delete($id);
	if($result){
		?>
		<script type="text/javascript">
			alert('Data Berhasil di Hapus');
			window.location.href="index.php?home=users";
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert('Data Gagal di Hapus');
			window.location.href="index.php?home=users";
		</script>
		<?php
	}
}