<?php

class supplierModel{
    private $id;
    private $nama;
    private $no_telp;
    private $alamat;

    public function __construct() {
        
    }
    public function getId() {
        return $this->id;
    }
    public function getNama(){
        return $this->nama;
    }
    public function getNoTelp(){
        return $this->no_telp;
    }
    public function getAlamat(){
        return $this->alamat;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function setNama($nama){
        $this->nama = $nama;
    }
    public function setNoTelp($no_telp){
        $this->no_telp = $no_telp;
    }
    public function setAlamat($alamat){
        $this->alamat = $alamat;
    }




}