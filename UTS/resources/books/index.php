<?php

require_once('../../app/controllers/BookController.php');

//initialize Class to Object
$book = new BookController();

$menu = @$_GET['menu'];
$id = @$_GET['id'];

if($menu == ''){	
	//get add data
	echo $book->index();
}else if($menu == 'show'){
	//get one data by id
	echo $book->read($id);
}else if($menu == 'tambah'){
	//add Data
	$book->add(array(
	    'serial' => $_POST['serial'],
	    'title' => $_POST['title'],
	    'author' => $_POST['author'],
	    'synopsis' => $_POST['synopsis'],
	    'id_books_categories' => $_POST['id_books_categories']
	));
}else if($menu == 'update'){
	//update data
	$book->update(array(
	    'serial' => $_POST['serial'],
	    'title' => $_POST['title'],
	    'author' => $_POST['author'],
	    'synopsis' => $_POST['synopsis'],
	    'id_books_categories' => $_POST['id_books_categories']
	));
}else if($menu == 'delete'){
	$book->delete($id);
}else{
	echo "Menu tidak di temukan";
}

//delete Data
