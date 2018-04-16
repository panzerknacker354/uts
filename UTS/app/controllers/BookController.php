<?php

require_once('../../eloquent/record.php');
require_once('Presenter.php');

class BookController{

    protected $table    = 'books';
    protected $id       = 'id';

    public function __construct(){
        $this->response = new Presenter;
        $this->db = new Record;
    }

    public function index(){
        $books = $this->db->get('books');
        if(count($books) > 0){
            $arr = array();
            foreach($books as $book){
                $data = array(
                    'id' => $book['id'],
                    'type' => 'books',
                    'attribute' => array(
                        'serial' => $book['serial'],
                        'title' => $book['title'],
                        'author' => $book['author'],
                        'synopsis' => $book['synopsis'],
                        'id_books_categories' => $book['id_books_categories'],
                    )
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    public function read($id){
        $book = $this->db->read($this->id, $id, $this->table);
        if(count($book) > 0){
            $arr = array();
            foreach($book as $row){
                $data = array(
                    'id' => $row['id'],
                    'type' => 'users',
                    'attribute' => array(
                        'serial' => $book['serial'],
                        'title' => $book['title'],
                        'author' => $book['author'],
                        'synopsis' => $book['synopsis'],
                        'id_books_categories' => $book['id_books_categories'],
                    )
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    public function add($payload){
        $book = $this->db->add($this->table, $payload);
        if($book){
            $result = array(
                'message' => 'success',
                'attribute' => $payload
            );
        }else{
            $result = array(
                'message' => 'failed'
            );
        }
        return $this->response->json($result);
    }

    public function update($id, $payload){
        $book = $this->db->update($this->table, $this->id, $id, $payload);
        if($book){
            $result = array(
                'message' => 'success',
                'attribute' => $payload
            );
        }else{
            $result = array(
                'message' => 'failed',
            );
        }
        return $this->response->json($result);
    }

    public function delete($id){
        $book = $this->db->delete($this->id, $id, $this->table);
        $result = array(
            'meta' => array(
                'count' => $book
            )
        );
        return $this->response->json($result);
    }
}
