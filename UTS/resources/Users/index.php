<?php

require_once('../../app/controllers/UserController.php');

//initialize Class to Object
$user = new UserController();

$menu = @$_GET['menu'];
$id = @$_GET['id'];

if($menu == ''){	
	//get add data
	echo $user->index();
}else if($menu == 'show'){
	//get one data by id
	echo $user->read($id);
}else if($menu == 'tambah'){
	//add Data
	$user->add(array(
	    'first_name' => $_POST['first_name'],
	    'last_name' => $_POST['last_name'],
	    'username' => $_POST['username'],
	    'email' => $_POST['email']
	));
}else if($menu == 'update'){
	//update data
	$user->update(array(
	    'first_name' => $_POST['first_name'],
	    'last_name' => $_POST['last_name'],
	    'username' => $_POST['username'],
	    'email' => $_POST['email']
	));
}else if($menu == 'delete'){
	$user->delete($id);
}else{
	echo "Menu tidak di temukan";
}

//delete Data
