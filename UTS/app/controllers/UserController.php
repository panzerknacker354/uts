<?php

require_once('eloquent/record.php');
require_once('Presenter.php');

class UserController{

    protected $table    = 'users';
    protected $id       = 'id';

    public function __construct(){
        $this->response = new Presenter;
        $this->db = new Record;
    }

    public function index(){
        $users = $this->db->get('users');
        if(count($users) > 0){
            $arr = array();
            foreach($users as $user){
                $data = array(
                    'id' => $user['id'],
                    'type' => 'users',
                    'attribute' => array(
                        'first_name' => $user['first_name'],
                        'last_name' => $user['last_name'],
                        'username' => $user['username'],
                        'email' => $user['email']
                    )
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    public function read($id){
        $user = $this->db->read($this->id, $id, $this->table);
        if(count($user) > 0){
            $arr = array();
            foreach($user as $row){
                $data = array(
                    'id' => $row['id'],
                    'type' => 'users',
                    'attribute' => array(
                        'first_name' => $row['first_name'],
                        'last_name' => $row['last_name'],
                        'username' => $row['username'],
                        'email' => $row['email']
                    )
                );
                array_push($arr, $data);
            }
            return $this->response->json($arr);
        }
    }

    public function add($payload){
        $user = $this->db->add($this->table, $payload);
        if($user){
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
        $user = $this->db->update($this->table, $this->id, $id, $payload);
        if($user){
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
        $user = $this->db->delete($this->id, $id, $this->table);
        $result = array(
            'meta' => array(
                'count' => $user
            )
        );
        return $this->response->json($result);
    }
}
