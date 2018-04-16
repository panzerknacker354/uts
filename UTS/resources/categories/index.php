<?php

require_once('../../app/controllers/CategoryController.php');

//initialize Class to Object
$category = new CategoryController();

$menu = @$_GET['menu'];
$id = @$_GET['id'];

if($menu == ''){	
	//get add data
	echo $category->index();
}else if($menu == 'show'){
	//get one data by id
	echo $category->read($id);
}else if($menu == 'tambah'){
	//add Data
	$category->add(array(
	    'name' => $_POST['name'],
	    'description' => $_POST['description'],
	));
}else if($menu == 'update'){
	//update data
	$category->update(array(
	    'name' => $_POST['name'],
	    'description' => $_POST['description'],
	));
}else if($menu == 'delete'){
	$category->delete($id);
}else{
	echo "Menu tidak di temukan";
}

//delete Data
