<?php

class order
{
    public $name;
    public $id;
    public $count;
    function order()
    {
        
    }
    public function getName() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getCount() {
        return $this->count;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCount($count) {
        $this->count = $count;
    }


        
        
        
    }
    
    
    





/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
