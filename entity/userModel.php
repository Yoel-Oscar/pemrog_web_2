<?php
/**
 * 
 *@author Yoel Oscar 1672063
 */
class User {

    private $id;
    private $nama;
    private $username;
    private $password;

    public function __construct() {
        
    }

    public function getId() {
        return $this->id;
    }

    public function getNama() {
        return $this->nama;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNama($nama) {
        $this->nama = $nama;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

}
