<?php

class animal
{
    var $id;
    var $name;
    var $image;
    var $status;
    var $hash;

    /*attached questions*/
    var $questions;

    /* create a user object */
    function __construct(){
        global $db;
        $this->hash = uniqid().md5(rand());
    }

    /* Loading datas */
    function loadFromId( $id ){
        global $db;
        $stmt = $db->prepare( 'SELECT * FROM animals  WHERE id=?' );
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $this->loadFromRow( $row );
        }
    }

    function loadFromRow( $row ){
        $this->id       = $row['id'];
        $this->name     = $row['name'];
        $this->image     = $row['image'];
        $this->status   = $row['status'];
        $this->hash   = $row['hash'];
    }

    function loadFromHash( $hash ){
        global $db;
        $stmt = $db->prepare( 'SELECT * FROM animals  WHERE hash=?' );
        $stmt->bind_param('i', $hash);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $this->loadFromRow( $row );
        }
    }

    function loadRandom(){
        global $db;
        global $currentUser;
        $stmt = $db->prepare( 'SELECT * FROM animals 
            WHERE 
            id NOT IN (SELECT animal_id FROM answers WHERE user_id=?) 
            AND 
            status=1
            ORDER BY RAND() LIMIT 0,1' );
        $stmt->bind_param(
            'i',
            $currentUser->id
        );
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()) {
            $this->loadFromRow( $row );
        }
    }

    function save(){
        global $db;
        $query = '
          INSERT INTO animals ( 
            id,
            name,
            image,
            status,
            hash
            )
            VALUES
            (
            ?,?,?,?,?
            )
            ON DUPLICATE KEY UPDATE
            
            name=?,
            image=?,
            status=?,
            hash=?
           ';
        $stmt = $db->prepare( $query );
        $stmt->bind_param('ississsis',
            $this->id,
            $this->name,
            $this->image,
            $this->status,
            $this->hash,
            $this->name,
            $this->image,
            $this->status,
            $this->hash
        );
        return $stmt->execute();
    }

    function render(){
        ob_start();
        include __DIR__.'/../templates/animal.tpl.php';
        return ob_get_clean();
    }

    function renderForm(){
        ob_start();
        include __DIR__.'/../templates/animalform.tpl.php';
        return ob_get_clean();
    }

    function renderQuestions(){
        ob_start();
        include __DIR__.'/../templates/animalform.tpl.php';
        return ob_get_clean();
    }
}
