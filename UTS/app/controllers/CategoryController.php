<?php

require_once('../../eloquent/record.php');
require_once('Presenter.php');

class CategoryController{

    protected $table    = 'categories';
    protected $id       = 'id';

    public function __construct(){
        $this->response = new Presenter;
        $this->db = new Record;
    }

    public function index(){
        $categories = $this->db->get('categories');
        if(count($categories) > 0){
            $arr = array();
            foreach($categories as $category){
                $data = array(
                    'id' => $category['id'],
                    'type' => 'categories',
                    'attribute' => array(
                        'name' => $category['name'],
                        'description' => $category['description'],
                    )
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    public function read($id){
        $category = $this->db->read($this->id, $id, $this->table);
        if(count($category) > 0){
            $arr = array();
            foreach($category as $row){
                $data = array(
                    'id' => $row['id'],
                    'type' => 'users',
                    'attribute' => array(
                        'name' => $row['name'],
                        'description' => $row['description'],
                    )
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    public function add($payload){
        $category = $this->db->add($this->table, $payload);
        if($category){
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
        $category = $this->db->update($this->table, $this->id, $id, $payload);
        if($category){
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
        $category = $this->db->delete($this->id, $id, $this->table);
        $result = array(
            'meta' => array(
                'count' => $category
            )
        );
        return $this->response->json($result);
    }
}
